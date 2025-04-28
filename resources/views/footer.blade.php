<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

     <!-- Footer -->
    <footer class="text-center text-lg-start text-white navbar-dark bg-dark" dir="ltr">

        <!-- Section: Links  -->
        <section class="border-bottom pt-3">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Test App
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Pages
                        </h6>
                        <p>
                            <a href="{{ route('home') }}" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="#about" class="text-reset">About</a>
                        </p>
                        <p>
                            <a href="{{ route('login') }}" class="text-reset">Login</a>
                        </p>
                        <p>
                            <a href="{{ route('register') }}" class="text-reset">Register</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Mansoura</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@neoxero.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" dir="rtl" style="background-color: rgba(0, 0, 0, 0.05);">
            <p class="mb-0">جميع الحقوق محفوظة &copy; {{ date('Y') }} ، تشغيل ونطوير inDeal</p>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
