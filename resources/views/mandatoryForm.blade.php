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
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">نموذج تقديم منتج إلزامي</h2>
    <form action="{{ route('mandatory.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly >
            </div>
        </div>

        <!-- بيانات المصنع والمنتج -->
        <div class="form-section">
            <div class="form-title">بيانات المنتج</div>

            <div class="mb-2">
                <label class="form-label">بلد المصنع</label>
                <input type="text" class="form-control" name="factory_country">
            </div>
            <div class="mb-2">
                <label class="form-label">اسم المصنع أو مزود الخدمة</label>
                <input type="text" class="form-control" name="factory_name">
            </div>
            <div class="mb-2">
                <label class="form-label">نوع الصنف</label>
                <select class="form-select" name="item_type">
                    <option value="">-- اختر النوع --</option>
                    <option value="medical">سلعة طبية</option>
                    <option value="non_medical">سلعة غير طبية</option>
                    <option value="service">خدمة</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">الرمز الطبي (NUPCO)</label>
                <input type="text" class="form-control" name="nupco_code">
            </div>
            <div class="mb-2">
                <label class="form-label">الوصف الطبي (NUPCO)</label>
                <input type="text" class="form-control" name="nupco_description">
            </div>

            <!-- العلاقات الديناميكية -->
            <div class="mb-2">
                <label class="form-label">القطاع</label>
                <select id="sector" name="sector_id" class="form-select" required>
                    <option value="">-- اختر القطاع --</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">المجموعة</label>
                <select id="group" name="group_id" class="form-select" required></select>
            </div>
            <div class="mb-2">
                <label class="form-label">الفئة</label>
                <select id="category" name="category_id" class="form-select" required></select>
            </div>
            <div class="mb-2">
                <label class="form-label">المنتج</label>
                <select id="product" name="product_id" class="form-select" required></select>
            </div>
        </div>

        <!-- بيانات الاتصال -->
        <div class="form-section">
            <div class="form-title">بيانات الاتصال</div>
            <div class="mb-2">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-2">
                <label class="form-label">الموقع الإلكتروني</label>
                <input type="url" class="form-control" name="website">
            </div>
            <div class="mb-2">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="mb-2">
                <label class="form-label">المنطقة</label>
                <input type="text" class="form-control" name="region">
            </div>
            <div class="mb-2">
                <label class="form-label">العنوان</label>
                <textarea class="form-control" name="address"></textarea>
            </div>
        </div>

        <!-- بيانات الجهة -->
        <div class="form-section">
            <div class="form-title">بيانات الجهة</div>
            <div class="mb-2">
                <label class="form-label">رقم السجل التجاري</label>
                <input type="text" class="form-control" name="commercial_registration_number">
            </div>
            <div class="mb-2">
                <label class="form-label">الاسم التجاري حسب السجل</label>
                <input type="text" class="form-control" name="registered_name">
            </div>
            <div class="mb-2">
                <label class="form-label">رقم الترخيص الصناعي</label>
                <input type="text" class="form-control" name="industrial_license_number">
            </div>
            <div class="mb-2">
                <label class="form-label">هل حاصل على شهادة المحتوى المحلي؟</label>
                <select class="form-select" name="has_local_content_certificate">
                    <option value="">-- اختر --</option>
                    <option value="1">نعم</option>
                    <option value="0">لا</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">نسبة شهادة المحتوى المحلي %</label>
                <input type="number" class="form-control" name="local_content_percentage">
            </div>
        </div>

        <!-- المرفقات -->
        <div class="form-section">
            <div class="form-title">المرفقات</div>
            <div class="mb-2">
                <label class="form-label">الترخيص الصناعي</label>
                <input type="file" class="form-control" name="industrial_license">
            </div>
            <div class="mb-2">
                <label class="form-label">شهادة المحتوى المحلي</label>
                <input type="file" class="form-control" name="local_content_certificate">
            </div>
            <div class="mb-2">
                <label class="form-label">تصريح هيئة الغذاء والدواء</label>
                <input type="file" class="form-control" name="sfda_certificate">
            </div>
            <div class="mb-2">
                <label class="form-label">تصريح آخر</label>
                <input type="file" class="form-control" name="other_certificate">
            </div>
            <div class="mb-2">
                <label class="form-label">ملاحظات إضافية</label>
                <textarea class="form-control" name="notes"></textarea>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#sector').change(function() {
        let sectorID = $(this).val();
        $('#group').html('<option>جاري التحميل...</option>');
        $.get('/api/groups/' + sectorID, function(data) {
            let options = '<option value="">-- اختر المجموعة --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#group').html(options);
            $('#category').html('<option value="">-- اختر الفئة --</option>');
            $('#product').html('<option value="">-- اختر المنتج --</option>');
        });
    });

    $('#group').change(function() {
        let groupID = $(this).val();
        $('#category').html('<option>جاري التحميل...</option>');
        $.get('/api/categories/' + groupID, function(data) {
            let options = '<option value="">-- اختر الفئة --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#category').html(options);
            $('#product').html('<option value="">-- اختر المنتج --</option>');
        });
    });

    $('#category').change(function() {
        let categoryID = $(this).val();
        $('#product').html('<option>جاري التحميل...</option>');
        $.get('/api/products/' + categoryID, function(data) {
            let options = '<option value="">-- اختر المنتج --</option>';
            data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
            $('#product').html(options);
        });
    });
</script>
</body>
</html>
