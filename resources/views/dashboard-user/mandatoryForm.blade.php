<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نموذج تقديم المنتجات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { padding: 2rem; background: #f8f9fa; }
        .form-section { margin-bottom: 1.5rem; }
        .form-title { font-weight: bold; margin-bottom: 1rem; font-size: 1.25rem; border-bottom: 1px solid #ccc; padding-bottom: .5rem; }
        .is-invalid { border-color: #dc3545; }
        .invalid-feedback { color: #dc3545; display: none; width: 100%; margin-top: 0.25rem; font-size: 0.875em; }
        .was-validated .form-control:invalid ~ .invalid-feedback,
        .was-validated .form-control:invalid ~ .invalid-feedback,
        .was-validated .form-select:invalid ~ .invalid-feedback,
        .form-control.is-invalid ~ .invalid-feedback,
        .form-select.is-invalid ~ .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">نموذج تقديم منتج إلزامي</h2>
    
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('mandatory.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <!-- بيانات مقدم الطلب -->
        <div class="form-section">
            <div class="form-title">بيانات مقدم الطلب</div>
            <div class="mb-2">
                <label class="form-label">الاسم</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="mb-2">
                <label class="form-label">الدور الوظيفي</label>
                <input type="text" class="form-control" value="{{ auth()->user()->role ?? '---' }}" readonly>
            </div>
            <div class="mb-2">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="mb-2">
                <label class="form-label">رقم الجوال</label>
                <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly>
            </div>
        </div>

        <!-- بيانات المصنع والمنتج -->
        <div class="form-section">
            <div class="form-title">بيانات المنتج</div>

            <div class="mb-2">
                <label class="form-label">بلد المصنع <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="factory_country" required>
                <div class="invalid-feedback">يرجى إدخال بلد المصنع</div>
            </div>
            <div class="mb-2">
                <label class="form-label">اسم المصنع أو مزود الخدمة <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="factory_name" required>
                <div class="invalid-feedback">يرجى إدخال اسم المصنع</div>
            </div>

            <div class="mb-2">
                <label class="form-label">نسبة التصنيع المحلي %</label>
                <input type="text" class="form-control" name="baseline_ratio">
                <div class="invalid-feedback">يرجى إدخال نسبة صحيحة</div>
            </div>

            <div class="mb-2">
                <label class="form-label">نوع الصنف <span class="text-danger">*</span></label>
                <select class="form-select" name="item_type" id="item_type" required>
                    <option value="">-- اختر النوع --</option>
                    <option value="medical" {{ old('item_type') == 'medical' ? 'selected' : '' }}>سلعة طبية</option>
                    <option value="non_medical" {{ old('item_type') == 'non_medical' ? 'selected' : '' }}>سلعة غير طبية</option>
                    <option value="service" {{ old('item_type') == 'service' ? 'selected' : '' }}>خدمة</option>
                </select>
                <div class="invalid-feedback">يرجى اختيار نوع الصنف</div>
            </div>
            
            <!-- NUPCO Fields - Only shown for medical products -->
            <div id="nupco_fields" style="display: {{ old('item_type') == 'medical' ? 'block' : 'none' }};">
                <div class="mb-2">
                    <label class="form-label">الرمز الطبي (NUPCO)</label>
                    <input type="text" class="form-control" name="nupco_code" value="{{ old('nupco_code') }}">
                    <div class="invalid-feedback">يرجى إدخال رمز صحيح</div>
                </div>
                <div class="mb-2">
                    <label class="form-label">الوصف الطبي (NUPCO)</label>
                    <input type="text" class="form-control" name="nupco_description" value="{{ old('nupco_description') }}">
                    <div class="invalid-feedback">يرجى إدخال وصف صحيح</div>
                </div>
            </div>

            <!-- العلاقات الديناميكية -->
            <div class="mb-2">
                <label class="form-label">القطاع <span class="text-danger">*</span></label>
                <select id="sector" name="sector_id" class="form-select" required>
                    <option value="">-- اختر القطاع --</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>{{ $sector->name_ar }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">يرجى اختيار القطاع</div>
            </div>
            <div class="mb-2">
                <label class="form-label">المجموعة <span class="text-danger">*</span></label>
                <select id="group" name="group_id" class="form-select" required>
                    <option value="">-- اختر المجموعة --</option>
                    @if(old('group_id') && $groups)
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name_ar }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="invalid-feedback">يرجى اختيار المجموعة</div>
            </div>
            <div class="mb-2">
                <label class="form-label">الفئة <span class="text-danger">*</span></label>
                <select id="category" name="category_id" class="form-select" required>
                    <option value="">-- اختر الفئة --</option>
                    @if(old('category_id') && $categories)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_ar }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="invalid-feedback">يرجى اختيار الفئة</div>
            </div>
            <div class="mb-2">
                <label class="form-label">المنتج <span class="text-danger">*</span></label>
                <select id="product" name="product_id" class="form-select" required>
                    <option value="">-- اختر المنتج --</option>
                    @if(old('product_id') && $products)
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name_ar }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="invalid-feedback">يرجى اختيار المنتج</div>
            </div>
        </div>

        <!-- بيانات الاتصال -->
        <div class="form-section">
            <div class="form-title">بيانات الاتصال</div>
            <div class="mb-2">
                <label class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح</div>
            </div>
            <div class="mb-2">
                <label class="form-label">الموقع الإلكتروني <span class="text-danger">*</span></label>
                <input type="url" class="form-control" name="website" value="{{ old('website') }}" required>
                <div class="invalid-feedback">يرجى إدخال موقع إلكتروني صحيح</div>
            </div>
            <div class="mb-2">
                <label class="form-label">رقم الهاتف <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                <div class="invalid-feedback">يرجى إدخال رقم هاتف صحيح</div>
            </div>
            <div class="mb-2">
                <label class="form-label">المنطقة <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="region" value="{{ old('region') }}" required>
                <div class="invalid-feedback">يرجى إدخال المنطقة</div>
            </div>
            <div class="mb-2">
                <label class="form-label">العنوان <span class="text-danger">*</span></label>
                <textarea class="form-control" name="address" required>{{ old('address') }}</textarea>
                <div class="invalid-feedback">يرجى إدخال العنوان</div>
            </div>
        </div>

        <!-- بيانات الجهة -->
        <div class="form-section">
            <div class="form-title">بيانات الجهة</div>
            <div class="mb-2">
                <label class="form-label">رقم السجل التجاري <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="commercial_registration_number" value="{{ old('commercial_registration_number') }}" required>
                <div class="invalid-feedback">يرجى إدخال رقم السجل التجاري</div>
            </div>
            <div class="mb-2">
                <label class="form-label">الاسم التجاري حسب السجل <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="registered_name" value="{{ old('registered_name') }}" required>
                <div class="invalid-feedback">يرجى إدخال الاسم التجاري</div>
            </div>
            <div class="mb-2">
                <label class="form-label">رقم الترخيص الصناعي <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="industrial_license_number" value="{{ old('industrial_license_number') }}" required>
                <div class="invalid-feedback">يرجى إدخال رقم الترخيص الصناعي</div>
            </div>
            <div class="mb-2">
                <label class="form-label">هل حاصل على شهادة المحتوى المحلي؟ <span class="text-danger">*</span></label>
                <select class="form-select" name="has_local_content_certificate" required>
                    <option value="">-- اختر --</option>
                    <option value="1" {{ old('has_local_content_certificate') == '1' ? 'selected' : '' }}>نعم</option>
                    <option value="0" {{ old('has_local_content_certificate') == '0' ? 'selected' : '' }}>لا</option>
                </select>
                <div class="invalid-feedback">يرجى اختيار الإجابة</div>
            </div>
            <div class="mb-2">
                <label class="form-label">نسبة شهادة المحتوى المحلي %</label>
                <input type="number" class="form-control" name="local_content_percentage" value="{{ old('local_content_percentage') }}" min="0" max="100">
                <div class="invalid-feedback">يرجى إدخال نسبة بين 0 و 100</div>
            </div>
        </div>

        <!-- المرفقات -->
        <div class="form-section">
            <div class="form-title">المرفقات</div>
            <div class="mb-2">
                <label class="form-label">الترخيص الصناعي <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="industrial_license" required accept=".pdf,.jpg,.jpeg,.png">
                <div class="invalid-feedback">يرجى رفع ملف الترخيص الصناعي (PDF, JPG, PNG)</div>
                @if($errors->has('industrial_license'))
                    <div class="text-danger">{{ $errors->first('industrial_license') }}</div>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label">شهادة المحتوى المحلي <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="local_content_certificate" required accept=".pdf,.jpg,.jpeg,.png">
                <div class="invalid-feedback">يرجى رفع ملف شهادة المحتوى المحلي (PDF, JPG, PNG)</div>
                @if($errors->has('local_content_certificate'))
                    <div class="text-danger">{{ $errors->first('local_content_certificate') }}</div>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label">تصريح هيئة الغذاء والدواء <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="sfda_certificate" required accept=".pdf,.jpg,.jpeg,.png">
                <div class="invalid-feedback">يرجى رفع ملف تصريح هيئة الغذاء والدواء (PDF, JPG, PNG)</div>
                @if($errors->has('sfda_certificate'))
                    <div class="text-danger">{{ $errors->first('sfda_certificate') }}</div>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label">تصريح آخر</label>
                <input type="file" class="form-control" name="other_certificate" accept=".pdf,.jpg,.jpeg,.png">
                <div class="invalid-feedback">يرجى رفع ملف صحيح (PDF, JPG, PNG)</div>
                @if($errors->has('other_certificate'))
                    <div class="text-danger">{{ $errors->first('other_certificate') }}</div>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label">ملاحظات إضافية</label>
                <textarea class="form-control" name="notes">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Client-side validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    // Dynamic dropdowns
    $('#sector').change(function() {
        let sectorID = $(this).val();
        $('#group').html('<option value="">جاري التحميل...</option>');
        if(!sectorID) {
            $('#group').html('<option value="">-- اختر المجموعة --</option>');
            $('#category').html('<option value="">-- اختر الفئة --</option>');
            $('#product').html('<option value="">-- اختر المنتج --</option>');
            return;
        }
        
        $.get('/api/groups/' + sectorID, function(data) {
            let options = '<option value="">-- اختر المجموعة --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#group').html(options);
            $('#category').html('<option value="">-- اختر الفئة --</option>');
            $('#product').html('<option value="">-- اختر المنتج --</option>');
        }).fail(function() {
            $('#group').html('<option value="">-- اختر المجموعة --</option>');
            alert('حدث خطأ أثناء تحميل المجموعات');
        });
    });

    $('#group').change(function() {
        let groupID = $(this).val();
        $('#category').html('<option value="">جاري التحميل...</option>');
        if(!groupID) {
            $('#category').html('<option value="">-- اختر الفئة --</option>');
            $('#product').html('<option value="">-- اختر المنتج --</option>');
            return;
        }
        
        $.get('/api/categories/' + groupID, function(data) {
            let options = '<option value="">-- اختر الفئة --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#category').html(options);
            $('#product').html('<option value="">-- اختر المنتج --</option>');
        }).fail(function() {
            $('#category').html('<option value="">-- اختر الفئة --</option>');
            alert('حدث خطأ أثناء تحميل الفئات');
        });
    });

    $('#category').change(function() {
        let categoryID = $(this).val();
        let itemType = $('#item_type').val();
        $('#product').html('<option value="">جاري التحميل...</option>');
        
        if(!categoryID) {
            $('#product').html('<option value="">-- اختر المنتج --</option>');
            return;
        }
        
        // Include item_type in the API request
        $.get('/api/products/' + categoryID, { item_type: itemType }, function(data) {
            let options = '<option value="">-- اختر المنتج --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#product').html(options);
        }).fail(function() {
            $('#product').html('<option value="">-- اختر المنتج --</option>');
            alert('حدث خطأ أثناء تحميل المنتجات');
        });
    });


    $(document).ready(function() {
        // Show/hide NUPCO fields and filter products when item_type changes
        $('#item_type').change(function() {
            // Show/hide NUPCO fields
            if ($(this).val() === 'medical') {
                $('#nupco_fields').show();
            } else {
                $('#nupco_fields').hide();
                $('input[name="nupco_code"]').val('');
                $('input[name="nupco_description"]').val('');
            }
            
            // Reload products if a category is already selected
            if ($('#category').val()) {
                $('#category').trigger('change');
            }
        });
    });

    // Initialize dropdowns if there are old values
    @if(old('sector_id'))
        $(document).ready(function() {
            $('#sector').trigger('change');
            setTimeout(function() {
                $('#group').val('{{ old('group_id') }}').trigger('change');
            }, 500);
        });
    @endif
    
    @if(old('group_id'))
        $(document).ready(function() {
            setTimeout(function() {
                $('#category').val('{{ old('category_id') }}').trigger('change');
            }, 1000);
        });
    @endif
    
    @if(old('category_id'))
        $(document).ready(function() {
            setTimeout(function() {
                $('#product').val('{{ old('product_id') }}');
            }, 1500);
        });
    @endif
</script>
</body>
</html>