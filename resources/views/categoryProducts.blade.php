<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجات {{ $category->name_ar }} - Neoxero App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
</head>
<body>

    @include('navbar')

    <!-- Product Section -->
    <section class="py-5 mt-5 bg-light">
        <div class="container py-5">

            <h1 class="section-title mb-3">{{ $category->name_ar }}</h1>

            <div class="row gx-4 gy-5 mt-4">
                @forelse($products as $product)
                    <div class="col-xxl-3 col-lg-4 col-sm-6 item">
                        <a href="{{ route('showProduct', $product->id) }}" class="text-decoration-none">
                            <div class="category-box">
                                <div class="category-body text-center">

                                    <h2 class="category-title">{{ $product->name_ar }}</h2>

                                    <button class="btn btn-primary category-btn w-100">
                                         تفاصيل المنتج <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info text-center">
                            لا توجد منتجات متاحة في هذه الفئة حالياً.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
