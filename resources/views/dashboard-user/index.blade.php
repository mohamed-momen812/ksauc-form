<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>

    <!-- Custom fonts for this template-->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fc;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #4e73df;
        }

        .stat-card {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .stat-icon {
            font-size: 3rem;
            color: #4e73df;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
        }

        .stat-label {
            font-size: 1.25rem;
            color: #6c757d;
        }

        .sector-card {
            background-color: #f8f9fc;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .sector-title {
            font-size: 1.5rem;
            color: #4e73df;
        }
        .sector-body {
            padding: 1rem;
        }
        .sector-card:hover {
            background-color: #e2e6ea;
            transition: background-color 0.3s ease;
        }
        .sector-card:hover .sector-title {
            color: #2e59d9;
        }
        .sector-card:hover .sector-body {
            background-color: #fff;
            transition: background-color 0.3s ease;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard-user.header')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard-user.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container py-5">
                    <div class="row mb-1">
                        <div class="col-12 text-center">
                            <h1 class="section-title">إحصائيات الطلبات</h1>
                        </div>
                    </div>
                
                    @if($ordersCount > 0)
                        <!-- Statistics Cards -->
                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-4">
                                <div class="stat-card text-center">
                                    <div class="stat-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="stat-value">{{ $ordersCount }}</div>
                                    <div class="stat-label">إجمالي الطلبات</div>
                                </div>
                            </div>
                
                            <div class="col-md-4">
                                <div class="stat-card text-center">
                                    <div class="stat-icon">
                                        <i class="fas fa-industry"></i>
                                    </div>
                                    <div class="stat-value">{{ $sectors->count() }}</div>
                                    <div class="stat-label">عدد القطاعات المستهدفة</div>
                                </div>
                            </div>
                        </div>

                        <br>
                
                        <!-- Sectors Cards -->
                        <div class="mt-5">
                            <h2 class="text-center section-title">القطاعات المستهدفة</h2>
                            <div class="row" style="place-content: center;" dir="rtl">
                                @foreach ($sectors as $i => $sector)
                                    <div class="col-md-4 mb-4">
                                        <div class="sector-card text-center p-3 shadow-sm rounded" style="background: #fff; min-height: 200px;">
                                            <div class="sector-body">
                                                <div class="sector-number mb-2" style="font-size: 1.5rem; font-weight: bold; color: #3498db;">
                                                     القطاع رقم {{ $i + 1 }}
                                                </div>
                                                <h5 class="sector-title">{{ $sector->name_ar }}</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                
                    @endif
                </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
