<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجات {{ $category->name_ar }} - Neoxero App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body {
            font-family: serif !important;
        }
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
            background: #f5f4f43d;
            border: 1px solid #eeeeee;
            /* border-radius: 15px; */
            /* box-shadow: 0 5px 15px rgba(0,0,0,0.1); */
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 150px;
        }
        .category-box:hover {
            transform: translateY(-1px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            border: 1px solid #3498db;
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
        .category-btn {
            background: #3498db !important;
            border: none !important;
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

    @include('navbar')

    <section class="py-5 bg-light">
        <div class="container py-5">
            
            
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="text-center mb-3">{{ $category->name_ar }}</h1>
                </div>
            </div>
        
            <div class="row gx-0 gy-5 aos-init aos-animate">
                @forelse($products as $product)
                    <div class="col-xxl-3 col-lg-4 col-sm-6 item">
                        <a href="{{ route('showProduct', $product->id) }}" class="text-decoration-none">
                            <div class="category-box">
                                <div class="category-body">
                                    <div>
                                        <h2 class="category-title">{{ $product->name_ar }}</h2>
                                    </div>
                                    <button class="btn btn-primary category-btn w-100"> تفاصيل المنتج <i class="fa-solid fa-arrow-left"></i></button>
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