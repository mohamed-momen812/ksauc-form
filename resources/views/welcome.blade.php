<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا بك في الموقع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2>مرحبا بك في الموقع</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead">نحن سعداء بتواجدك في الموقع. استعرض خدماتنا وابدأ رحلتك معنا اليوم!</p>
                        <a href="{{ route('mandatory.form') }}" class="btn btn-primary">ابدأ الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
