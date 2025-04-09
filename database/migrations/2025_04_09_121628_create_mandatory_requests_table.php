<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mandatory_requests', function (Blueprint $table) {
            $table->id();
    
            // بيانات مقدم الطلب
            $table->unsignedBigInteger('user_id');
    
            // بيانات المصنع والمنتج
            $table->string('factory_country');
            $table->string('factory_name');
            $table->string('baseline-ratio')->nullable();
            $table->string('item_type');
            $table->string('nupco_code')->nullable();
            $table->string('nupco_description')->nullable();
            $table->foreignId('sector_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
    
            // بيانات الاتصال
            $table->string('email');
            $table->string('website');
            $table->string('phone');
            $table->string('region');
            $table->text('address');
    
            // بيانات الجهة
            $table->string('commercial_registration_number');
            $table->string('registered_name');
            $table->string('industrial_license_number');
            $table->boolean('has_local_content_certificate');
            $table->decimal('local_content_percentage', 5, 2);
    
            // ملفات
            $table->string('industrial_license');
            $table->string('local_content_certificate');
            $table->string('sfda_certificate');
            $table->string('other_certificate')->nullable();
    
            // ملاحظات
            $table->text('notes')->nullable();
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandatory_requests');
    }
};
