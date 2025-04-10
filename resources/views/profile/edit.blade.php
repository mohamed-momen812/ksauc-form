@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    @if (auth()->user()->isAdmin())
        @include('dashboard-admin.header')
    @elseif(!auth()->user()->isAdmin())
        @include('dashboard-user.header')
    @endif
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @if (auth()->user()->isAdmin())
                @include('dashboard-admin.navbar')
            @elseif(!auth()->user()->isAdmin())
                @include('dashboard-user.navbar')
            @endif
            <!-- End of Topbar -->

            <div class="font-sans antialiased">
                <div class="bg-gray-100"></div>
                    <div class="pb-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
    </div>
</div>
