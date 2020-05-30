<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $this->getTitle(); ?></title>
    <link href="../../../assets/fontawesome-5.13/css/all.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/admin/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../../assets/admin/assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../../assets/admin/dist/css/style.min.css" rel="stylesheet">
    <link href="../../../assets/admin/dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="../../../assets/admin/dataTable/css/addons/datatables2.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../../assets/admin/dataTable/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../../../assets/admin/dataTable/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"
          integrity="sha256-2bAj1LMT7CXUYUwuEnqqooPb1W0Sw0uKMsqNH0HwMa4=" crossorigin="anonymous"/>

    <script src="../../../assets/js/jquery-3.5.0.min.js"></script>
    <script src="../../../assets/js/script.js"></script>

</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header" data-logobg="skin5">

                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>

                <div class="navbar-brand">
                    <a href="/admin" class="logo">
                        <b class="logo-icon">

                            <img src="../../../assets/admin/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />

                            <img src="../../../assets/admin/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>

                        <span class="logo-text">

                            <img src="../../../assets/admin/assets/images/logo-text.png" alt="homepage" class="dark-logo" />

                            <img src="../../../assets/admin/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>

                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">


<!--                <ul class="navbar-nav float-left mr-auto">

                    <li class="nav-item search-box">
                        <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-magnify font-20 mr-1"></i>
                                <div class="ml-1 d-none d-sm-block">
                                    <span>Search</span>
                                </div>
                            </div>
                        </a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control search" placeholder="Search &amp; enter">
                            <a class="srh-btn">
                                <i class="ti-close"></i>
                            </a>
                        </form>
                    </li>
                </ul>-->

                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../../assets/admin/assets/images/users/default-img.jpg" alt="user" class="rounded-circle" width="31">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="/admin/dashboard/profile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt m-r-5 m-l-5"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin5">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/dashboard/index" aria-expanded="false">
                            <i class="mdi mdi-av-timer"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/category/index" aria-expanded="false">
                            <i class="far fa-copyright"></i>
                            <span class="hide-menu">Category</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/product/index" aria-expanded="false">
                            <i class="fab fa-pinterest-p"></i>
                            <span class="hide-menu">Product</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/order/index" aria-expanded="false">
                            <i class="fab fa-opera"></i>
                            <span class="hide-menu">Order</span><span class="badge_admin badge_order"></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/contact/index" aria-expanded="false">
                            <i class="fas fa-sms"></i>
                            <span class="hide-menu">Contact </span><span class="badge_admin badge_contact"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <?php if (!empty($content) && isset($content)): ?>
    <?php include_once $this->basePath.$content.".php"; ?>
    <?php endif; ?>
    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="/admin">Admin</a>.
    </footer>

</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- All Jquery -->
<script src="../../../assets/admin/assets/libs/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../../assets/admin/assets/libs/popper/popper.min.js"></script>
<script src="../../../assets/admin/assets/libs/bootstrap/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../../assets/admin/assets/extra-libs/sparkline.js"></script>
<!--Wave Effects -->
<script src="../../../assets/admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../../assets/admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../../../assets/admin/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="../../../assets/admin/assets/libs/chartist/chartist.min.js"></script>
<script src="../../../assets/admin/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>
<script src="../../../assets/admin/dist/js/pages/dashboard1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="../../../assets/admin/dataTable/js/addons/datatables2.min.js"></script>

</body>

</html>