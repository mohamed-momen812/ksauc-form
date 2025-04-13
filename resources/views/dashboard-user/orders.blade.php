<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>
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
                <div class="container-fluid">

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>المستخدم</th>
                                            <th>بلد المصنع</th>
                                            <th>اسم المصنع</th>
                                            <th>نسبة التصنيع المحلي</th>
                                            <th>نوع الصنف</th>
                                            <th>الرمز الطبي</th>
                                            <th>الوصف الطبي</th>
                                            <th>القطاع</th>
                                            <th>المجموعة</th>
                                            <th>الفئة</th>
                                            <th>المنتج</th>
                                            <th>الإيميل</th>
                                            <th>الموقع الإلكتروني</th>
                                            <th>الهاتف</th>
                                            <th>المنطقة</th>
                                            <th>العنوان</th>
                                            <th>السجل التجاري</th>
                                            <th>الاسم المسجل</th>
                                            <th>رقم الترخيص الصناعي</th>
                                            <th>شهادة المحتوى المحلي</th>
                                            <th>نسبة المحتوى المحلي</th>
                                            <th>رخصة صناعية</th>
                                            <th>شهادة المحتوى المحلي</th>
                                            <th>شهادة هيئة الغذاء والدواء</th>
                                            <th>شهادات أخرى</th>
                                            <th>ملاحظات</th>
                                            <th>حالة الطلب</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? '-' }}</td>
                                            <td>{{ $order->factory_country }}</td>
                                            <td>{{ $order->factory_name }}</td>
                                            <td>{{ $order->{'baseline-ratio'} ?? '-' }}</td>
                                            <td>{{ $order->item_type }}</td>
                                            <td>{{ $order->nupco_code ?? '-' }}</td>
                                            <td>{{ $order->nupco_description ?? '-' }}</td>
                                            <td>{{ $order->sector->name_ar }}</td>
                                            <td>{{ $order->group->name_ar }}</td>
                                            <td>{{ $order->category->name_ar }}</td>
                                            <td>{{ $order->product->name_ar }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->website }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->region }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->commercial_registration_number }}</td>
                                            <td>{{ $order->registered_name }}</td>
                                            <td>{{ $order->industrial_license_number }}</td>
                                            <td>{{ $order->has_local_content_certificate ? 'نعم' : 'لا' }}</td>
                                            <td>{{ $order->local_content_percentage }}%</td>
                                            <td>
                                                @if($order->industrial_license)
                                                    <a href="{{ asset('storage/' . $order->industrial_license) }}" target="_blank">عرض</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->local_content_certificate)
                                                    <a href="{{ asset('storage/' . $order->local_content_certificate) }}" target="_blank">عرض</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->sfda_certificate)
                                                    <a href="{{ asset('storage/' . $order->sfda_certificate) }}" target="_blank">عرض</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->other_certificate)
                                                    <a href="{{ asset('storage/' . $order->other_certificate) }}" target="_blank">عرض</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $order->notes }}</td>
                                            <td>
                                                @if($order->status == 'pending')
                                                    <span class="badge badge-warning">قيد الانتظار</span>
                                                @elseif($order->status == 'confirmed')
                                                    <span class="badge badge-success">مؤكد</span>
                                                @elseif($order->status == 'refused')
                                                    <span class="badge badge-danger">مرفوض</span>
                                                @endif
                                            </td>
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
