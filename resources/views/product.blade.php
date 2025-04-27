<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name_ar }} - Neoxero App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f5f5;
        }
        
        .product-gallery {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .main-image {
            height: 400px;
            object-fit: contain;
            background-color: var(--light-gray);
            width: 100%;
        }
        
        .thumbnail-container {
            display: flex;
            gap: 10px;
            padding: 15px;
            overflow-x: auto;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        
        .thumbnail:hover, .thumbnail.active {
            border-color: var(--primary-color);
        }
        
        .product-details-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 25px;
            height: 100%;
        }
        
        .product-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .product-category {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }
        
        .rating {
            color: #f39c12;
            margin-bottom: 15px;
        }
        
        .price-container {
            margin-bottom: 20px;
        }
        
        .current-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1.2rem;
            margin-right: 10px;
        }
        
        .discount-badge {
            background-color: #e74c3c;
            color: white;
            padding: 3px 10px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-right: 10px;
        }
        
        .product-meta {
            margin: 25px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        
        .meta-item {
            margin-bottom: 10px;
        }
        
        .meta-label {
            font-weight: 600;
            color: var(--secondary-color);
            width: 120px;
            display: inline-block;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            background: none;
            font-size: 1.2rem;
            cursor: pointer;
        }
        
        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            border-left: none;
            border-right: none;
        }
        
        .action-btns .btn {
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .product-tabs {
            margin-top: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
        }
        
        .nav-tabs .nav-link {
            color: var(--secondary-color);
            font-weight: 600;
            border: none;
            padding: 10px 20px;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            background: transparent;
        }
        
        .tab-content {
            padding: 20px 0;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 20px;
        }
        
        .related-product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .related-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .related-product-img {
            height: 150px;
            object-fit: cover;
            width: 100%;
        }
        
        .related-product-body {
            padding: 15px;
        }
        
        .related-product-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .related-product-price {
            font-weight: 700;
            color: var(--primary-color);
        }
    </style>
</head>
<body>

    @include('navbar')

    <section class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الفئات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name_ar }}</li>
                </ol>
            </nav>
        </div>
    </section>
</body>
</html>