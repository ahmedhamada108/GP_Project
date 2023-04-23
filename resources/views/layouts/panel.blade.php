<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CheckUp | Admin panel</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin_panel/vendors/core/core.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('admin_panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_panel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin_panel/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_panel/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    @if (session('mode') === 'dark')
        <link rel="stylesheet" href="{{ asset('admin_panel/css/demo_2/style.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('admin_panel/css/demo_1/style.css') }}">
    @endif

    <!-- End layout styles -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="Check Up">
    <meta name="application-name" content="Check Up">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <img class="image" style="width: 10rem;" src="{{ asset('imgs/Full_Logo_Light.png') }}" alt="Logo">
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{ route('admin_dashboard') }}" class="nav-link">
                            <i class="fa-solid fa-gauge"></i>                            
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Diseases</li>
                    <li class="nav-item">
                        <a href="{{ route('main_diseases') }}" class="nav-link">
                            <i class="fa-solid fa-disease"></i>                            
                          <span class="link-title">Main Diseases</span>
                        </a>
                      </li>
                    <li class="nav-item nav-category">Theme</li>
                    <li class="nav-item">
                    @if (session('mode') === 'dark')
                        <a href="{{ route('change_mode', ['mode' => request()->input('mode','light')]) }}" class="nav-link">
                            <i class="fa-sharp fa-solid fa-lightbulb"></i>                        
                            <span class="link-title">Light Mode</span>
                    @else
                        <a href="{{ route('change_mode', ['mode' => request()->input('mode','dark')]) }}" class="nav-link">
                            <i class="fa-sharp fa-solid fa-lightbulb"></i>                        
                            <span class="link-title">Dark Mode</span>
                    @endif
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile" style="bottom: 12px;">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">Amiah Burton</p>
                                        <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="pages/general/profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="repeat"></i>
                                                <span>Switch User</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('logout_admin') }}" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->


            @yield('content')

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="{{route('home').'/'.LaravelLocalization::getCurrentLocale()}}"
                        target="_blank">CheckUp</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i
                        class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('admin_panel/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('admin_panel/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_panel/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin_panel/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('admin_panel/js/datepicker.js') }}"></script>
    <script src="{{ asset('admin_panel/js/dashboard.js') }}"></script>
    <script src="https://kit.fontawesome.com/cb2611cb8b.js" crossorigin="anonymous"></script>
    <!-- end custom js for this page -->
    <script src="{{ asset('admin_panel/js/data-table.js') }}"></script>
      <!-- plugin js for this page -->
    <script src="{{ asset('admin_panel/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_panel/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
</body>

</html>
