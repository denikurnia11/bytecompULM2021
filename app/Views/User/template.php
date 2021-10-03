<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png" />


    <!-- App css -->
    <link href="<?= base_url() ?>/assets/adminTemplate/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/adminTemplate/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?= base_url() ?>/assets/adminTemplate/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <!-- Datatables css -->
    <link href="<?= base_url() ?>/assets/adminTemplate/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/adminTemplate/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <style>
        .bs-example {
            background: #eeeeee;
            border-radius: 6px;
            padding-right: 60px;
            padding-left: 60px;
            padding-top: 48px;
            padding-bottom: 48px;

        }

        .jumbotron h1 {
            font-size: 63px;
            /* font-weight: 500; */
            line-height: 1.1;
        }
    </style>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="<?= base_url() ?>/user" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="<?= base_url() ?>/assets/adminTemplate/images/logo.png" alt="" height="85" />
                </span>
                <span class="logo-sm">
                    <img src="<?= base_url() ?>/assets/adminTemplate/images/logo.png" alt="" height="26" />
                </span>
            </a>


            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="<?= base_url(); ?>/user" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">Menu</li>

                    <li class="side-nav-item">
                        <a href="<?= base_url(); ?>/user/pendaftaran" class="side-nav-link">
                            <i class="mdi mdi-trophy-outline"></i>
                            <span> Daftar Lomba </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url(); ?>/user/pembayaran" class="side-nav-link">
                            <i class="dripicons-clipboard"></i>
                            <span> Pembayaran </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?= base_url(); ?>/user/dashboard/timeline" class="side-nav-link">
                            <i class="mdi mdi-timer-outline"></i>
                            <span> Timeline </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url() ?>/user/dashboard/faq" class="side-nav-link">
                            <i class="mdi mdi-comment-question-outline me-1"></i>
                            <span> FAQ </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url() ?>/logout" class="side-nav-link">
                            <i class="mdi mdi-logout me-1"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                </ul>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>

                        </li>


                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?= base_url() ?>/assets/adminTemplate/images/users/default.jpg" alt="user-image" class="rounded-circle" />
                                </span>
                                <span>
                                    <span class="account-user-name"> <?= session()->nama; ?> </span>
                                    <span class="account-position"> <?= session()->role; ?></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Timeline !</h6>
                                </div>
                                <!-- <a href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal">Load me</a> -->
                                <!-- item-->
                                <a href="<?= base_url(); ?>/user/dashboard/profile" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>


                                <!-- item-->
                                <a href="<?= base_url() ?>/logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"><?= $judul; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?= $this->renderSection('content'); ?>
                        </div>
                    </div>
                    <!-- end page title -->


                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © Bytecomp - Himakom.ulm.ac.id
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end footer-links d-none d-md-block">
                                        <a data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Jika mengalami kesulitan, Silakan hubungi nomor WA berikut : 087840006063 (Deni Kurnia)"><span style="cursor: pointer;">Contact Us</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>

                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->


            </div>
            <!-- END wrapper -->


            <!-- Right Sidebar -->
            <div class="end-bar">

                <div class="rightbar-title">
                    <a href="javascript:void(0);" class="end-bar-toggle float-end">
                        <i class="dripicons-cross noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <div class="rightbar-content h-100" data-simplebar="">

                    <div class="p-3">

                        <!-- Settings -->
                        <h5 class="mt-3">Color Scheme</h5>
                        <hr class="mt-1">

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>


                        <!-- Width -->
                        <h5 class="mt-4">Width</h5>
                        <hr class="mt-1">
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>


                        <!-- Left Sidebar-->
                        <h5 class="mt-4">Left Sidebar</h5>
                        <hr class="mt-1">
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                            <label class="form-check-label" for="default-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                            <label class="form-check-label" for="condensed-check">Condensed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>


                    </div> <!-- end padding-->

                </div>
            </div>

            <div class="rightbar-overlay"></div>
            <!-- /End-bar -->

            <!-- plugin js -->
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dropzone.min.js"></script>
            <!-- init js -->
            <script src="<?= base_url() ?>/assets/adminTemplate/js/ui/component.fileupload.js"></script>


            <!-- bundle -->
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor.min.js"></script>
            <script src="<?= base_url() ?>/assets/adminTemplate/js/app.min.js"></script>


            <!-- Datatables js -->
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.bootstrap5.js"></script>
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/dataTables.responsive.min.js"></script>
            <script src="<?= base_url() ?>/assets/adminTemplate/js/vendor/responsive.bootstrap5.min.js"></script>


            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <!-- demo app -->
            <script src="/assets/adminTemplate/js/pages/demo.form-wizard.js"></script>
            <!-- end demo js-->
            <script>
                $(document).ready(function() {
                    $('#basic-datatable').DataTable();
                    // $('.welcomeModal').modal('show');

                });
            </script>

</body>

</html>