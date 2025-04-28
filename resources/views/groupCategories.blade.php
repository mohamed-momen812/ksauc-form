<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
</head>
<body>

    <!-- Navbar -->
    @include('navbar')

    <!-- Categories Section -->
    <section class="py-5 mt-5 bg-gray-100">
        <div class="container py-5">

            <h1 class="section-title mb-5">{{ $group->name_ar }}</h1>

            <div class="row gx-4 gy-5 mt-4">
                @forelse ($categories as $category)
                    <div class="col-xxl-3 col-lg-4 col-sm-6 item">
                        <a href="{{ route('showCategoryProducts', $category->id) }}" class="text-decoration-none">
                            <div class="category-box">
                                <div class="category-body text-center">

                                    <h2 class="category-title">{{ $category->name_ar }}</h2>
                                    <p><b>{{ $category->products->count() }}</b> منتج</p>

                                    <button class="btn btn-primary category-btn w-100">
                                        استكشف الآن <i class="fa-solid fa-arrow-left"></i>
                                    </button>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
