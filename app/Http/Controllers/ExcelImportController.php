<?php

namespace App\Http\Controllers;

use App\Imports\MandatoryProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new MandatoryProductImport, $request->file('file'));

        return back()->with('success', 'Excel data imported successfully!');
    }
}
