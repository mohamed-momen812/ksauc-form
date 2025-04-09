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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User</th>
                                            <th>Sector</th>
                                            <th>Segment No</th>
                                            <th>Segment Title (AR)</th>
                                            <th>Segment Title (EN)</th>
                                            <th>Etimad Code</th>
                                            <th>Commodity Title (AR)</th>
                                            <th>Commodity Title (EN)</th>
                                            <th>Commodity Definition (AR)</th>
                                            <th>Commodity Definition (EN)</th>
                                            <th>Group Code</th>
                                            <th>Group Name</th>
                                            <th>Section Code</th>
                                            <th>Section Name (AR)</th>
                                            <th>Section Name (EN)</th>
                                            <th>Class Code</th>
                                            <th>Class Name</th>
                                            <th>Chapter Code</th>
                                            <th>Chapter Name</th>
                                            <th>Item Code</th>
                                            <th>Item Name (EN)</th>
                                            <th>Item Name (AR)</th>
                                            <th>Technical Description (AR)</th>
                                            <th>Technical Description (EN)</th>
                                            <th>Price Ceiling</th>
                                            <th>Effective Date</th>
                                            <th>Manufacturer Local Content</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $product->user?->name }}</td>
                                            <td>{{ $order->sector }}</td>
                                            <td>{{ $order->segment_no }}</td>
                                            <td>{{ $order->segment_title_ar }}</td>
                                            <td>{{ $order->segment_title_en }}</td>
                                            <td>{{ $order->etimad_code }}</td>
                                            <td>{{ $order->commodity_title_ar }}</td>
                                            <td>{{ $order->commodity_title_en }}</td>
                                            <td>{{ $order->commodity_definition_ar }}</td>
                                            <td>{{ $order->commodity_definition_en }}</td>
                                            <td>{{ $order->group_code }}</td>
                                            <td>{{ $order->group_name }}</td>
                                            <td>{{ $order->section_code }}</td>
                                            <td>{{ $order->section_name_ar }}</td>
                                            <td>{{ $order->section_name_en }}</td>
                                            <td>{{ $order->class_code }}</td>
                                            <td>{{ $order->class_name }}</td>
                                            <td>{{ $order->chapter_code }}</td>
                                            <td>{{ $order->chapter_name }}</td>
                                            <td>{{ $order->item_code }}</td>
                                            <td>{{ $order->item_name_en }}</td>
                                            <td>{{ $order->item_name_ar }}</td>
                                            <td>{{ $order->technical_description_ar }}</td>
                                            <td>{{ $order->technical_description_en }}</td>
                                            <td>{{ $order->price_ceiling }}</td>
                                            <td>{{ $order->effective_date }}</td>
                                            <td>{{ $order->manufacturer_local_content }}</td>
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
