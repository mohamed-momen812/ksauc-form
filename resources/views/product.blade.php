<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $product->name_ar }} - Neoxero App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
            body { background: #f8f9fa; font-family: 'Tajawal', sans-serif; }
            .product-card {
                background: #fff;
                border: 1px solid #e3e3e3;
                border-radius: 12px;
                box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
                padding: 30px;
                margin-top: 30px;
                text-align: center;
            }
            .product-card h2 {
                font-size: 1.75rem;
                margin-bottom: 10px;
                color: #333;
            }
            .product-card p {
                color: #666;
                font-size: 1rem;
                margin-bottom: 15px;
            }
            .product-info {
                margin-top: 20px;
                text-align: right;
            }
            .product-info h5 {
                font-weight: bold;
                color: #3498db;
                margin-bottom: 10px;
            }
            .product-info p {
                margin-bottom: 8px;
            }
            .section-title {
                font-size: 2.5rem;
                font-weight: 700;
                text-align: center;
                color: #2c3e50;
                margin-bottom: 2rem;
            }
            .highlight {
                color: #e74c3c;
                font-weight: bold;
            }
        </style>
    </head>
    
    <body>
        @include('navbar')
    
        <div class="container">
    
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="product-card">
                        <h2>{{ $product->name_ar }}</h2>
                        <h2>{{ $product->name_en }}</h2>
                        <p>{{ $product->description_ar }}</p>
                        <p>{{ $product->description_en }}</p>
    
                        <div class="product-info">
                            <h5>السقف السعري</h5>
                            <p>{{ number_format($product->price_ceiling, 2) }}%</p>
    
                            <h5>تاريخ التطبيق</h5>
                            <p>{{ \Carbon\Carbon::parse($product->effective_date)->format('d-m-Y') }}</p>
    
                            <h6 class="highlight text-center mt-4">
                                يشترط وجود شهادة المحتوى المحلي للمصنع اعتبارًا من هذا التاريخ
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>