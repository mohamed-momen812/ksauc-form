<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_applications', function (Blueprint $table) {
            $table->id();
            
            // Applicant Information
            $table->string('name');
            $table->string('job_title');
            $table->string('email');
            $table->string('mobile');
            
            // Request Information
            $table->string('factory_country');
            $table->string('sector');
            $table->string('group_code');
            $table->string('class_code');
            $table->string('item_code');
            $table->string('product_type');
            $table->string('factory_name');
            $table->decimal('baseline_ratio', 5, 2)->nullable();
            $table->string('medical_code')->nullable();
            $table->string('medical_description')->nullable();
            
            // Contact Information
            $table->string('contact_email');
            $table->string('website');
            $table->string('phone');
            $table->string('region');
            $table->text('address');
            
            // Company Information
            $table->string('commercial_registration');
            $table->string('trade_name');
            $table->string('license_number');
            $table->boolean('local_certificate');
            $table->decimal('local_percentage', 5, 2);
            
            // File Paths
            $table->string('industrial_license_path');
            $table->string('baseline_certificate_path');
            $table->string('medical_products_permit_path')->nullable();
            $table->string('other_permits_path')->nullable();
            
            // Additional Notes
            $table->text('additional_notes')->nullable();
            
            // Relationships
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_applications');
    }
};