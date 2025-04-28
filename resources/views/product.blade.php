<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $product->name_ar }} - Neoxero App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                background: linear-gradient(to right, #eef2f3, #8e9eab);
                font-family: 'Tajawal', sans-serif;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .container {
                flex: 1;
            }

            .product-card {
                background: #fff;
                border: none;
                border-radius: 20px;
                box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
                padding: 40px 30px;
                margin-top: 50px;
                text-align: center;
                transition: 0.3s ease-in-out;
            }

            .product-card:hover {
                transform: translateY(-10px);
                box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.2);
            }

            .product-card h2 {
                font-size: 2rem;
                margin-bottom: 10px;
                color: #2c3e50;
                font-weight: 700;
            }

            .product-card p {
                color: #7f8c8d;
                font-size: 1.1rem;
                margin-bottom: 15px;
            }

            .product-info {
                margin-top: 30px;
                text-align: right;
            }

            .product-info h5 {
                font-weight: bold;
                color: #3498db;
                margin-bottom: 8px;
                font-size: 1.2rem;
            }

            .product-info p {
                margin-bottom: 12px;
                font-size: 1.1rem;
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
                font-size: 1.2rem;
            }

            footer {
                text-align: center;
                padding: 20px;
                background: #2c3e50;
                color: #fff;
                font-size: 0.9rem;
                margin-top: 50px;
            }
        </style>
    </head>

    <body>

        <!-- Navbar -->
        @include('navbar')

        <!-- Product Section -->
        <div class="container my-5">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 col-md-10">
                    <div class="product-card">
                        <h2>{{ $product->name_ar }}</h2>
                        <h2 class="text-muted">{{ $product->name_en }}</h2>

                        <p>{{ $product->description_ar }}</p>
                        <p>{{ $product->description_en }}</p>

                        <div class="product-info">
                            <h5>السقف السعري</h5>
                            <p>{{ number_format($product->price_ceiling, 2) }}%</p>

                            <h5>تاريخ التطبيق</h5>
                            <p>{{ \Carbon\Carbon::parse($product->effective_date)->format('d-m-Y') }}</p>

                            <div class="text-center mt-4">
                                <p class="highlight">
                                    يشترط وجود شهادة المحتوى المحلي للمصنع اعتبارًا من هذا التاريخ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
