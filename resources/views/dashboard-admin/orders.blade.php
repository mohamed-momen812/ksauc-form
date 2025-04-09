<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tables</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard-admin.header')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard-admin.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>المستخدم</th>
                                            <th>القطاع</th>
                                            <th>المجموعة</th>
                                            <th>الفئة</th>
                                            <th>المنتج</th>
                                            <th>بلد المصنع</th>
                                            <th>اسم المصنع</th>
                                            <th>نسبة التصنيع المحلي</th>
                                            <th>نوع الصنف</th>
                                            <th>الرمز الطبي</th>
                                            <th>الوصف الطبي</th>
                                            <th>الهاتف</th>
                                            <th>الإيميل</th>
                                            <th>المنطقة</th>
                                            <th>العنوان</th>                                            
                                            <th>ملاحظات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? '-' }}</td>
                                            <td>{{ $order->sector->name_ar ?? '-' }}</td>
                                            <td>{{ $order->group->name_ar ?? '-' }}</td>
                                            <td>{{ $order->category->name_ar ?? '-' }}</td>
                                            <td>{{ $order->product->name_ar ?? '-' }}</td>
                                            <td>{{ $order->factory_country }}</td>
                                            <td>{{ $order->factory_name }}</td>
                                            <td>{{ $order->{'baseline-ratio'} }}</td>
                                            <td>{{ $order->item_type }}</td>
                                            <td>{{ $order->nupco_code }}</td>
                                            <td>{{ $order->nupco_description }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->region }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->notes }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

</body>

</html>
