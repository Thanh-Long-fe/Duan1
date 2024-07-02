<?php


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
<![endif]-->
</head>
<style>
    .color input{
        border-color: red !important;
    }
    .color select{
        border-color: red !important;
    }
    .color textarea{
        border-color: red !important;
    }
    .color .form-message{
    color: red !important;
    }
    .toast_ {
    min-width: 400px;
    max-width: 450px;
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 2px;
    padding: 20px;
    border-left: 4px solid;
    box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
    animation: trans ease 0.3s, out linear 1s 3s forwards; 
    
  }
@keyframes trans{
  from {
    opacity: 0;
    transform: translateX(calc(100% + 32px));
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes out{
  to{
    display: none;
    opacity: 0;
  }
}

    .toast__icon {
    font-size: 24px;
    padding-right: 16px;
  }
  .toast_ + .toast_{
    margin-top: 24px;
  }

  .toast__body {
    flex-grow: 1; /* Phần này sẽ mở rộng để lấp đầy không gian còn trống */
  }

  .toast__title {
    margin-top: 0; /* Xóa margin top mặc định */
    margin-bottom: 8px; /* Tạo khoảng cách giữa tiêu đề và nội dung */
    font-size: 16px;
    font-weight: 800;
    color: black;
  }

  .toast__msg {
    margin-top: 0; /* Xóa margin top mặc định */
    margin-bottom: 0; /* Xóa margin bottom mặc định */
    font-size: 14px;
    color: #888;
    line-height: 1.5;
  }

  .toast__close {
    font-size: 20px;
    padding-left: 16px;
    color: rgba(0, 0, 0, 0.3);
    cursor: pointer;
  }
.toast--success{
border-color: #47d864;
}
.toast--success .toast__icon{
  color: #47d864;
}
.toast--error{
  border-color: #ff623d;
}
.toast--error .toast__icon{
  color: #ff623d;
}

.toast--warning{
  border-color: #f08048;
}
.toast--warning .toast__icon{
  color: #f08048;
}
#toast_{
position: fixed;
top: 132px;
right: 32px;
z-index: 1000;
}
    
    
    
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="toast_"></div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../view/index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Trang chủ</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_sanpham" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Sản phẩm</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=danhmuc" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Danh mục</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_th" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Thương hiệu</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Màu, kích thước, thanh toán </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php?act=mau" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Màu </span></a></li>
                                <li class="sidebar-item"><a href="index.php?act=size" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Size </span></a></li>
                                <li class="sidebar-item"><a href="index.php?act=pttt" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Phương thức thanh toán </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_hoadon" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Hóa đơn</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Người dùng </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php?act=binhluan" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Quản lý bình luận </span></a></li>
                                <li class="sidebar-item"><a href="index.php?act=dskh" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Quản lý người dùng </span></a></li>
                                <li class="sidebar-item"><a href="index.php?act=list_ban_acc" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Tài khoản bị khóa</span></a></li>
                                <li class="sidebar-item"><a href="index.php?act=list_report" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Bình luận bị báo cáo<output></output></span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_hide_sp" aria-expanded="false"><i class="bi bi-file-earmark-x-fill"></i></i><span class="hide-menu">Sản phẩm ẩn</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_hide_dm" aria-expanded="false"><i class="bi bi-file-earmark-x-fill"></i></i><span class="hide-menu">Danh mục ẩn</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=list_hide_th" aria-expanded="false"><i class="bi bi-file-earmark-x-fill"></i></i><span class="hide-menu">Thương hiệu ẩn</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php?act=feedback" aria-expanded="false"><i class="bi bi-messenger"></i><span class="hide-menu">FeedBack</span></a></li>





                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div id="toast">

        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->