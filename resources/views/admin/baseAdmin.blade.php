<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN PORTLINE</title>
    <!-- plugins:css -->
    <link rel="stylesheet"
        href="{{ asset('assetTemplate/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetTemplate/template/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assetTemplate/template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assetTemplate/template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assetTemplate/template/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assetTemplate/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assetTemplate/template/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assetTemplate/template/assets/images/favicon.png') }}" />

    {{-- CDN toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('adminCss/user.css') }}">

</head>

<body>
    <div class="container-scroller" style="max-width: 1500px; margin:auto">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            {{-- Logo --}}
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-decoration-none" href="index.html">
                    <h3 class="d-flex text-white">
                        <i>OKT</i>
                        <div style="color: rgb(205, 31, 31)">.</div>
                        DNL
                    </h3>
                </a>
                <a class="sidebar-brand brand-logo-mini" href="index.html">

                </a>
            </div>

            {{-- Sidebar --}}
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @if (optional(Auth::user())->image === null)
                                    <img class="img-xs rounded-circle" src="{{ asset('staticImages/noprofile.jpeg') }}"
                                        alt="" style="object-fit:cover; object-position:center; opacity:50%">
                                @else
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('/storage/' . Auth::user()->image) }}" alt=""
                                        height="100%" width="100%"
                                        style="object-fit: cover; object-position: center; ">
                                @endif
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name" style="overflow: hidden">
                                <h5 class="mb-0 font-weight-normal">
                                    {{ Str::limit(auth()->user()->name, 15) }}</h5>
                            </div>

                        </div>
                        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="{{ route('users.index') }}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link " href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-puzzle"></i>
                        </span>
                        <span class="menu-title">Skills</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="pages/forms/basic_elements.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-timeline-variant"></i>
                        </span>
                        <span class="menu-title">Experiences</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-web"></i>
                        </span>
                        <span class="menu-title">Sosmeds</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="pages/icons/mdi.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-certificate"></i>
                        </span>
                        <span class="menu-title">Certificates</span>
                    </a>
                </li>
                {{-- <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                                    Page </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                                </a></li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                            alt="logo" /></a> --}}
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>

                    <ul class="navbar-nav navbar-nav-right">
                        {{-- Notif --}}
                        {{-- <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown"
                                href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all notifications</p>
                            </div>
                        </li> --}}

                        {{-- Profile --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    @if (optional(Auth::user())->image === null)
                                        <img class="img-xs rounded-circle"
                                            src="{{ asset('staticImages/noprofile.jpeg') }}" alt=""
                                            style="object-fit:cover; object-position:center; opacity:50%">
                                    @else
                                        <img class="img-xs rounded-circle"
                                            src="{{ asset('/storage/' . Auth::user()->image) }}" alt=""
                                            height="100%" width="100%"
                                            style="object-fit: cover; object-position: center; ">
                                    @endif
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name ">
                                        {{ Auth::user()->name }}</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('users.index') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('logout') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>

                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>

                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                {{-- Yield --}}
                <div class="content-wrapper">

                    @yield('adminContent')

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">©2025
                            Daniel Oktafianus</span>

                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>


    {{-- CDN jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- CDN toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "timeOut": "4000",
            "extendedTimeOut": "1000"
        };
    </script>

    @if (session('loginSuccess'))
        <script>
            toastr.success(@json(session('loginSuccess')))
        </script>
    @endif
    @yield('toastr')



    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assetTemplate/template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assetTemplate/template/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <script src="{{ asset('assetTemplate/template/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assetTemplate/template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assetTemplate/template/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
</body>

</html>
