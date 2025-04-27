<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>


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
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <h1 class="section-title">إحصائيات الطلبات</h1>
                        </div>
                    </div>
                    
                    @if($ordersCount > 0)
                        <!-- Statistics Cards -->
                        <div class="row mb-5">
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
                                    <div class="stat-label">عدد القطاعات</div>
                                </div>
                                @foreach ($sectors as $sector)
                                    <div class="col-md-4">
                                        <div class="sector-card text-center">
                                            <div class="sector-body">
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
