<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        // Applicant Information
        'name',
        'job_title',
        'email',
        'mobile',
        
        // Request Information
        'factory_country',
        'sector',
        'group_code',
        'class_code',
        'item_code',
        'product_type',
        'factory_name',
        'baseline_ratio',
        'medical_code',
        'medical_description',
        
        // Contact Information
        'contact_email',
        'website',
        'phone',
        'region',
        'address',
        
        // Company Information
        'commercial_registration',
        'trade_name',
        'license_number',
        'local_certificate',
        'local_percentage',
        
        // File Paths
        'industrial_license_path',
        'baseline_certificate_path',
        'medical_products_permit_path',
        'other_permits_path',
        
        // Additional Notes
        'additional_notes',
        
        // Relationship
        'user_id'
    ];

    protected $casts = [
        'local_certificate' => 'boolean',
        'baseline_ratio' => 'decimal:2',
        'local_percentage' => 'decimal:2',
    ];

    /**
     * Relationship with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}