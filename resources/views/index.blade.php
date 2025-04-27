<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://www.imgcorporations.com/images/bg-img.jpg');
            background-size: cover;
            color: white;
            text-align: center;
            padding: 13em 0;
            height: 93dvh;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2rem;
        }
        .serv-img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .category-box {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .category-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .category-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .category-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        .category-description {
            color: #666;
            margin-bottom: 15px;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #2c3e50;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #3498db;
        }
        .section-subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('navbar')

    <!-- Categories Section -->
    <section class="py-5 bg-gray-100">
        <div class="container py-5">
    
            <div class="row g-4">
                @forelse ($categories as $category)
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="{{ route('showCategory', $category->id) }}" class="text-decoration-none">
                        <div class="category-box h-100">
                            <div class="category-body">
                                <div>
                                    <h3 class="category-title">{{ $category->name_ar }}</h3>
                                    <p class="text-muted">{{ $category->products->count() }} منتج</p>
                                </div>
                                <button class="btn btn-primary w-100">استكشف الآن</button>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        لا توجد فئات متاحة حالياً.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="section-title">لماذا تختارنا؟</h1>
                <p class="section-subtitle">نقدم أفضل الحلول التي تساعدك في إدارة عملك بكفاءة</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <img class="serv-img mb-4" src="https://via.placeholder.com/400x300?text=KPI+Management" alt="إدارة مؤشرات الأداء">
                        <h4 class="fw-bold mb-3">إدارة مؤشرات الأداء</h4>
                        <p class="text-muted">نظام متكامل لمراقبة مؤشرات الأداء وتحليل البيانات لتحسين أداء عملك</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <img class="serv-img mb-4" src="https://via.placeholder.com/400x300?text=Data+Analysis" alt="تحليل البيانات">
                        <h4 class="fw-bold mb-3">تحليل البيانات</h4>
                        <p class="text-muted">أدوات تحليل قوية لاتخاذ قرارات مستنيرة بناءً على بيانات دقيقة</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <img class="serv-img mb-4" src="https://via.placeholder.com/400x300?text=Support" alt="الدعم المستمر">
                        <h4 class="fw-bold mb-3">الدعم المستمر</h4>
                        <p class="text-muted">نقدم دعمًا شاملاً لمساعدتك في تحقيق النجاح والتميز في عملك</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">جميع الحقوق محفوظة &copy; {{ date('Y') }} تطبيق نيو أكسيرو</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>s