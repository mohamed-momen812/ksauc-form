<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>قائمة الطلبات</title>
        <style>
            /* Stats Section Styles */
            .stats-section {
                padding: 1.5rem 0;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 1.5rem;
                margin: 0 auto;
                max-width: 1200px;
            }

            .stat-card {
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                position: relative;
                height: 140px;
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            }

            .stat-content {
                padding: 1.5rem;
                height: 100%;
                display: flex;
                flex-direction: column;
                position: relative;
                z-index: 2;
            }

            .stat-title {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: rgba(255, 255, 255, 0.9);
            }

            .stat-value {
                font-size: 2rem;
                font-weight: 700;
                margin: 0;
                color: white;
                line-height: 1.2;
            }

            .stat-icon {
                position: absolute;
                right: 1.5rem;
                bottom: 1.5rem;
                opacity: 0.2;
            }

            .stat-icon svg {
                width: 60px;
                height: 60px;
            }

            /* Card Color Variants */
            .stat-info {
                background: linear-gradient(135deg, #36b9cc 0%, #258ea6 100%);
            }

            .stat-success {
                background: linear-gradient(135deg, #1cc88a 0%, #17a673 100%);
            }

            .stat-warning {
                background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);
            }

            .stat-danger {
                background: linear-gradient(135deg, #e74a3b 0%, #be2617 100%);
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .stats-grid {
                    grid-template-columns: 1fr 1fr;
                }
            }

            @media (max-width: 480px) {
                .stats-grid {
                    grid-template-columns: 1fr;
                }

                .stat-card {
                    height: 120px;
                }

                .stat-value {
                    font-size: 1.75rem;
                }
            }
        </style>
    </head>
    <body>
        <!-- Stats Section (الإحصائيات) -->
        <section class="stats-section">
            <div class="stats-grid">
                <!-- Registered Users Card -->
                <div class="stat-card stat-info">
                    <div class="stat-content">
                        <h3 class="stat-title">عدد المسجلين</h3>
                        <p class="stat-value">{{ $totalUsers }}</p>
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Orders Card -->
                <div class="stat-card stat-success">
                    <div class="stat-content">
                        <h3 class="stat-title">عدد الطلبات</h3>
                        <p class="stat-value">{{ $totalOrders }}</p>
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Approved Orders Card -->
                <div class="stat-card stat-warning">
                    <div class="stat-content">
                        <h3 class="stat-title">الطلبات المقبولة</h3>
                        <p class="stat-value">{{ $confirmedOrders }}</p>
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Rejected Orders Card -->
                <div class="stat-card stat-danger">
                    <div class="stat-content">
                        <h3 class="stat-title">الطلبات المرفوضة</h3>
                        <p class="stat-value">{{ $refusedOrders }}</p>
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
