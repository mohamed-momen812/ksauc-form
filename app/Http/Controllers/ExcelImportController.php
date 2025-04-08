<?php

namespace App\Http\Controllers;

use App\Imports\MandatoryProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function create()
    {
        return view('importForm');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        
        try {
            Excel::import(new MandatoryProductImport, $request->file('file'));
            
            return back()->with('success', 'Products imported successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing file: '.$e->getMessage());
        }
    }
}