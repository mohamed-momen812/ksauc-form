<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الطلبات</title>
    <style>
        :root {
            --primary-color: #4e73df;
            --success-color: #1cc88a;
            --danger-color: #e74a3b;
            --warning-color: #f6c23e;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fc;
            color: #333;
        }

        /* Flash Message */
        .alert-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            max-width: 400px;
            z-index: 1000;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            border-radius: 0.35rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            animation: slideIn 0.3s ease-out;
        }

        .alert-notification.success {
            background-color: var(--success-color);
            color: white;
        }

        .alert-notification .close {
            color: white;
            opacity: 0.8;
            font-size: 1.5rem;
            line-height: 1;
            padding: 0;
            background: transparent;
            border: none;
            margin-right: 1rem;
            cursor: pointer;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Card Styling */
        .data-card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .data-card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 1.5rem;
            border-bottom: none;
        }

        .data-card-title {
            font-weight: 600;
            margin: 0;
            font-size: 1.25rem;
        }

        /* Table Styling */
        .data-table-container {
            overflow-x: auto;
            padding: 0.5rem;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.9rem;
        }

        .data-table thead th {
            background-color: #2d3748;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1rem;
            vertical-align: middle;
            text-align: center;
            border: none;
            position: sticky;
            top: 0;
        }

        .data-table tbody td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
            background-color: white;
        }

        .data-table tbody tr:hover td {
            background-color: #f8f9fc;
        }

        .data-table tbody tr:first-child td {
            border-top: 1px solid #e3e6f0;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .badge-pending {
            background-color: var(--warning-color);
            color: #000;
        }

        .badge-confirmed {
            background-color: var(--success-color);
            color: white;
        }

        .badge-refused {
            background-color: var(--danger-color);
            color: white;
        }

        /* Action Buttons */
        .action-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.2rem;
            margin: 0.1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-confirm {
            background-color: var(--success-color);
            color: white;
        }

        .btn-refuse {
            background-color: var(--danger-color);
            color: white;
        }

        /* File Links */
        .file-link {
            color: var(--primary-color);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .file-link:hover {
            text-decoration: underline;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .data-table thead {
                display: none;
            }

            .data-table tbody td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid #e3e6f0;
            }

            .data-table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                width: calc(50% - 1rem);
                padding-right: 1rem;
                font-weight: bold;
                text-align: left;
            }

            .data-table tbody tr td:last-child {
                border-bottom: 2px solid #2d3748;
            }
        }
    </style>
</head>
<body>
    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert-notification success">
            <span>{{ session('success') }}</span>
            <button type="button" class="close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    <!-- Table Card -->
    <div class="data-card">
        <div class="data-card-header">
            <h5 class="data-card-title">قائمة الطلبات</h5>
        </div>
        <div class="data-card-body">
            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
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
                            <th>الموقع</th>
                            <th>الهاتف</th>
                            <th>المنطقة</th>
                            <th>العنوان</th>
                            <th>السجل التجاري</th>
                            <th>الاسم المسجل</th>
                            <th>رقم الترخيص الصناعي</th>
                            <th>ش.المحتوى المحلي</th>
                            <th>ن.المحتوى المحلي</th>
                            <th>رخصة صناعية</th>
                            <th>ش.المحتوى المحلي</th>
                            <th>ش.هيئة الغذاء</th>
                            <th>شهادات أخرى</th>
                            <th>ملاحظات</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td data-label="#">{{ $order->id }}</td>
                                <td data-label="المستخدم">{{ $order->user->name ?? '-' }}</td>
                                <td data-label="بلد المصنع">{{ $order->factory_country }}</td>
                                <td data-label="اسم المصنع">{{ $order->factory_name }}</td>
                                <td data-label="نسبة التصنيع المحلي">{{ $order->{'baseline-ratio'} ?? '-' }}</td>
                                <td data-label="نوع الصنف">{{ $order->item_type }}</td>
                                <td data-label="الرمز الطبي">{{ $order->nupco_code ?? '-' }}</td>
                                <td data-label="الوصف الطبي">{{ $order->nupco_description ?? '-' }}</td>
                                <td data-label="القطاع">{{ $order->sector->name_ar }}</td>
                                <td data-label="المجموعة">{{ $order->group->name_ar }}</td>
                                <td data-label="الفئة">{{ $order->category->name_ar }}</td>
                                <td data-label="المنتج">{{ $order->product->name_ar }}</td>
                                <td data-label="الإيميل">{{ $order->email }}</td>
                                <td data-label="الموقع">{{ $order->website }}</td>
                                <td data-label="الهاتف">{{ $order->phone }}</td>
                                <td data-label="المنطقة">{{ $order->region }}</td>
                                <td data-label="العنوان">{{ $order->address }}</td>
                                <td data-label="السجل التجاري">{{ $order->commercial_registration_number }}</td>
                                <td data-label="الاسم المسجل">{{ $order->registered_name }}</td>
                                <td data-label="رقم الترخيص الصناعي">{{ $order->industrial_license_number }}</td>
                                <td data-label="ش.المحتوى المحلي">{{ $order->has_local_content_certificate ? 'نعم' : 'لا' }}</td>
                                <td data-label="ن.المحتوى المحلي">{{ $order->local_content_percentage }}%</td>

                                <!-- الملفات -->
                                <td data-label="رخصة صناعية">{!! fileLink($order->industrial_license) !!}</td>
                                <td data-label="ش.المحتوى المحلي">{!! fileLink($order->local_content_certificate) !!}</td>
                                <td data-label="ش.هيئة الغذاء">{!! fileLink($order->sfda_certificate) !!}</td>
                                <td data-label="شهادات أخرى">{!! fileLink($order->other_certificate) !!}</td>

                                <td data-label="ملاحظات">{{ $order->notes }}</td>

                                <!-- الحالة -->
                                <td data-label="الحالة" class="text-center">
                                    @php
                                        $statuses = [
                                            'pending' => ['pending', 'قيد الانتظار'],
                                            'confirmed' => ['confirmed', 'مؤكد'],
                                            'refused' => ['refused', 'مرفوض'],
                                        ];
                                        [$badge, $label] = $statuses[$order->status] ?? ['secondary', 'غير معروف'];
                                    @endphp
                                    <span class="status-badge badge-{{ $badge }}">{{ $label }}</span>
                                </td>

                                <!-- الإجراءات -->
                                <td data-label="الإجراءات" class="text-center">
                                    <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="action-btn btn-confirm" onclick="return confirm('هل تريد تأكيد الطلب؟')">تأكيد</button>
                                    </form>
                                    <form action="{{ route('orders.refuse', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="action-btn btn-refuse" onclick="return confirm('هل تريد رفض الطلب؟')">رفض</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
