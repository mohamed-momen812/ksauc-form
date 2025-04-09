<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neoxero App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
        .navbar{
            height: 75px;
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
        .serv-img{
            width: 300px;
        }
    </style>
</head>
<body>

    <!-- الهيدر -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Test App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ url('/form') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Form</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mandatory.form') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Form 2</a>
                    </li>
                    @if (Route::has('login'))
                        <div class="d-flex">
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('logout') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                    class="py-0 px-0">
                                                <i class="icon-power mr-2"></i> Logout
                                            </x-dropdown-link>
                                        </form>
                                    </a>
                                </li> --}}
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="ml-4 nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                </li>
                                @endif
                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <h1>Welcome to our platform</h1>
            <p>The best technical solutions for monitoring performance and making decisions.</p>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg">START NOW</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">START NOW</a>
                    @endauth
                </div>
            @endif
        </div>
    </section>

    <section class="container my-5">
        <div class="text-center">
            <h2>Why choose us?</h2>
            <p class="text-muted">We provide the best solutions that help you manage your business efficiently.</p>
        </div>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <img class="serv-img rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9zOaGRuK5his3zviLKOMhKyzVqUASjy4yAQ&s" alt="icon">
                <h4 class="mt-3"> KPI Management</h4>
                <p>An integrated system for monitoring performance indicators and analyzing data.</p>
            </div>
            <div class="col-md-4">
                <img class="serv-img rounded" src="https://imgs.ie/wp-content/uploads/2024/01/Modern-Managed-Data-Services-Image-768x439.webp" alt="icon">
                <h4 class="mt-3">Data analysis </h4>
                <p>Powerful analysis tools to make informed decisions.</p>
            </div>
            <div class="col-md-4">
                <img class="serv-img rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_DRp07TM76fyTPkNVkZhiAHARcjb0am9urahe1YaCy5Qy8HnMmAA0VKwe-KFzNTatez0&usqp=CAU" alt="icon">
                <h4 class="mt-3">Continuous support </h4>
                <p>We offer comprehensive support to help you achieve success.</p>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center p-3">
        <p>All rights reserved &copy; {{ date('Y') }} NXApp</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
