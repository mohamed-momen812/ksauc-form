<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجات {{ $category->name_ar }} - Neoxero App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
        }
        
        .product-card {
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            height: 100%;
        }
        
        .product-card:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .product-body {
            padding: 15px;
        }
        
        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }
        
        .product-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        .product-old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }
        
        .badge-discount {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
        }
        
        .rating {
            color: #f39c12;
            margin-bottom: 10px;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
        }
    </style>
</head>
<body>

    @include('navbar')

    <section class="py-5 bg-light">
        <div class="container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الفئات</a></li>
                </ol>
            </nav>
            
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="text-center mb-3">{{ $category->name_ar }}</h1>
                </div>
            </div>
            
            <div class="row">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-card">
                        <div class="product-body">
                            <a href="{{ route('showProduct', $product->id) }}" class="product-title">{{ $product->name_ar }}</h3>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
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