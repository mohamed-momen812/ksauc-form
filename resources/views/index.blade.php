<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sectors</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
    </head>
    <body>

        <!-- Navbar -->
        @include('navbar')


        <!-- Home Section -->
        <section class="home-sec">
            <div class="home-sec-content">
                <h1>مرحباً بك في منصتنا</h1>
                <p>بادر بتقديم طلبك الآن واستمتع بخدماتنا المميزة</p>

                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="{{ url('/dashboard-admin') }}" class="btn btn-primary">لوحة التحكم</a>
                        @else
                            <a href="{{ route('mandatory.form') }}" class="btn btn-primary">سجل الآن</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">سجل الآن</a>
                    @endauth
                @endif
            </div>
        </section>


        <!-- Sectos Section -->
        <section class="py-5 bg-gray-100">
            <div class="container py-5">

                <h1 class="section-title">القطاعات المتاحة</h1>

                <div class="row gx-4 gy-5">
                    @forelse ($sectos as $sector)
                        <div class="col-xxl-3 col-lg-4 col-md-6">
                            <a href="{{ route('showSectorGroups', $sector->id) }}" class="text-decoration-none">
                                <div class="category-box">
                                    <div class="category-body text-center">
                                        <h2 class="category-title">{{ $sector->name_ar }}</h2>
                                        <p><b>{{ $sector->groups->count() }}</b> مجموعة</p>
                                        <button class="btn btn-primary category-btn w-100 mt-2">
                                            استكشف الآن <i class="fa-solid fa-arrow-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="alert alert-info">
                                لا توجد قطاعات متاحة حالياً.
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </section>


        <!-- Services Section -->
        <section class="py-5 bg-white" id="about">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h1 class="section-title">لماذا تختارنا؟</h1>
                    <p class="section-subtitle">نقدم أفضل الحلول التي تساعدك في إدارة عملك بكفاءة</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center p-4">
                            <img class="serv-img mb-4" src="https://img.freepik.com/free-photo/flat-lay-statistics-presentation-with-chart_23-2149023811.jpg?ga=GA1.1.1493929456.1744119780&semt=ais_hybrid&w=740" alt="إدارة مؤشرات الأداء">
                            <h4 class="fw-bold mb-3">إدارة مؤشرات الأداء</h4>
                            <p class="text-muted">نظام متكامل لمراقبة مؤشرات الأداء وتحليل البيانات لتحسين أداء عملك</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-4">
                            <img class="serv-img mb-4" src="https://img.freepik.com/free-photo/digital-increasing-bar-graph-with-businessman-hand-overlay_53876-97640.jpg?ga=GA1.1.1493929456.1744119780&semt=ais_hybrid&w=740" alt="تحليل البيانات">
                            <h4 class="fw-bold mb-3">تحليل البيانات</h4>
                            <p class="text-muted">أدوات تحليل قوية لاتخاذ قرارات مستنيرة بناءً على بيانات دقيقة</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-4">
                            <img class="serv-img mb-4" src="https://img.freepik.com/free-photo/business-partners-handshake-global-corporate-with-technology-concept_53876-102615.jpg?ga=GA1.1.1493929456.1744119780&semt=ais_hybrid&w=740" alt="الدعم المستمر">
                            <h4 class="fw-bold mb-3">الدعم المستمر</h4>
                            <p class="text-muted">نقدم دعمًا شاملاً لمساعدتك في تحقيق النجاح والتميز في عملك</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        @include('footer')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
