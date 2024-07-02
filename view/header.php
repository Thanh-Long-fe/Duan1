<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/shome/shome/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 11:07:08 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Shome - Shoes eCommerce Website Template" />
    <meta name="keywords" content="footwear, shoes, modern, shop, store, ecommerce, responsive, e-commerce" />
    <meta name="author" content="codecarnival" />

    <title>Home Two :: Shome - Shoes eCommerce Website Template</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--== Bootstrap CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Font Awesome Min Icon CSS ==-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--== Pe7 Stroke Icon CSS ==-->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="assets/css/swiper.min.css" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="assets/css/fancybox.min.css" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="assets/css/aos.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .color input {
        border-color: red !important;
    }

    .color select {
        border-color: red !important;
    }

    .color textarea {
        border-color: red !important;
    }

    .color .form-message {
        color: red !important;
    }

    .range-slider-container {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 20px 0;
    }

    .range-slider {
        position: absolute;
        width: 100%;
        height: 5px;
        border-radius: 5px;
        background-color: #ccc;
        outline: none;
        -webkit-appearance: none;
        cursor: pointer;
    }

    .range-slider::-webkit-slider-thumb {
        position: relative;
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #4CAF50;
        cursor: pointer;
        z-index: 1;
    }

    .range-slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #4CAF50;
        cursor: pointer;
        z-index: 1;
    }

    .range-slider::-webkit-slider-runnable-track {
        background: transparent;
        cursor: pointer;
        border-radius: 0;
        border: 0;
    }

    .range-value {
        position: absolute;
        top: -25px;
        left: 0;
        display: flex;
        justify-content: space-between;
        width: 100%;
        font-size: 14px;
    }

    .cong,
    .tru {
        cursor: pointer;
    }

    label:before,
    label::after {
        content: none !important;
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
#toast_{
position: fixed;
top: 132px;
right: 32px;
z-index: 1000;
}

 
</style>

<body>



    <!--wrapper start-->
    <div class="wrapper">
    <div id="toast_"></div>


  
        <!--== Start Header Wrapper ==-->
        <header class="main-header-wrapper position-relative">
            <div class="header-top">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-top-align">
                                <div class="header-top-align-start">
                                    <div class="desc">
                                        <p>World Wide Completely Free Returns and Free Shipping</p>
                                    </div>
                                </div>
                                <div class="header-top-align-end">
                                    <div class="header-info-items">
                                        <div class="info-items">
                                            <?php
                                            if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                                                extract($_SESSION['user']);
                                            ?>
                                                <ul>
                                                    <li class="number"><i class="fa fa-phone"></i><a href="tel://0123456789">+00 123 456 789</a></li>
                                                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto://demo@example.com">demo@example.com</a></li>
                                                    <li class="account"><i class="fa fa-user"></i><a href="index.php?act=info"><?= $ho_ten ?></a></li>

                                                </ul>
                                            <?php
                                            } else {
                                            ?>
                                                <ul>
                                                    <li class="number"><i class="fa fa-phone"></i><a href="tel://0123456789">+00 123 456 789</a></li>
                                                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto://demo@example.com">demo@example.com</a></li>
                                                    <li class="account"><i class="fa fa-user"></i><a href="index.php?act=login">Tài khoản</a></li>
                                                </ul>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container pt--0 pb--0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="header-middle-align">
                                <div class="header-middle-align-start">
                                    <div class="header-logo-area">
                                        <a href="index.php">
                                            <img class="logo-main" src="assets/img/logo.webp" width="131" height="34" alt="Logo" />
                                            <img class="logo-light" src="assets/img/logo-light.webp" width="131" height="34" alt="Logo" />
                                        </a>
                                    </div>
                                </div>
                                <div class="header-middle-align-center">
                                    <div class="header-search-area">
                                        <form class="header-searchbox" method="get" action="index.php">
                                            <input type="hidden" name="act" value="search">
                                            <input type="search" class="form-control" required placeholder="Search" name="key">
                                            <button class="btn-submit" type="submit"><i class="pe-7s-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-middle-align-end">
                                    <div class="header-action-area">
                                        <div class="shopping-search">
                                            <button class="shopping-search-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch"><i class="pe-7s-search icon"></i></button>
                                        </div>
                                        <div class="shopping-wishlist">
                                            <a class="shopping-wishlist-btn" href="shop-wishlist.html">
                                                <i class="pe-7s-like icon"></i>
                                            </a>
                                        </div>
                                        <div class="shopping-cart">
                                            <button class="shopping-cart-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="offcanvasRightLabel">
                                                <i class="pe-7s-shopbag icon"></i>
                                                <sup class="shop-count"></sup>
                                            </button>
                                        </div>
                                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                            <i class="pe-7s-menu"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-area header-default">
                <div class="container">
                    <div class="row no-gutter align-items-center position-relative">
                        <div class="col-12">
                            <div class="header-align">
                                <div class="header-navigation-area position-relative">
                                    <ul class="main-menu nav">
                                        <li><a href="index.php"><span>Trang Chủ</span></a></li>
                                        <li><a href="index.php?act=sanpham"><span>Sản Phẩm</span></a></li>
                                        <li class="has-submenu position-static"><a href="#/"><span>Loại</span></a>
                                            <ul class="submenu-nav submenu-nav-mega column-3" style="max-height: 300px; overflow-y: scroll;">
                                                <li class="mega-menu-item"><a href="#/" class="mega-title"><span>Thương
                                                            Hiệu</span></a>
                                                    <ul>
                                                        <?php
                                                        foreach ($listthuonghieu as $thuonghieu) {
                                                            extract($thuonghieu);
                                                            $linkth = "index.php?act=thuong_hieu&id=" . $id_thuong_hieu;
                                                            echo '<li>
                                                                        <a href="' . $linkth . '">' . $ten_thuong_hieu . '</a>
                                                                    </li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>
                                                <li class="mega-menu-item"><a href="#/" class="mega-title"><span>Danh
                                                            Mục</span></a>
                                                    <ul>
                                                        <?php
                                                        foreach ($listdanhmuc as $danhmuc) {
                                                            extract($danhmuc);
                                                            $linkth = "index.php?act=danh_muc&id=" . $id_danh_muc;
                                                            echo '<li>
                                                                        <a href="' . $linkth . '">' . $ten_danh_muc . '</a>
                                                                    </li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>


                                        <li><a href="index.php?act=contact"><span>Contact</span></a></li>
                                        <?php
                                        if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                                            extract($_SESSION['user']);
                                        ?>
                                            <li class="has-submenu"><a href="#"><span>Tài khoản</span></a>
                                                <ul class="submenu-nav">
                                                    <li><a href="index.php?act=info"><span>Thông tin tài khoản</span></a></li>
                                                </ul>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="has-submenu"><a href="#"><span>Tài khoản</span></a>
                                                <ul class="submenu-nav">
                                                    <li><a href="index.php?act=quen_mk"><span>Quên mật khẩu</span></a></li>
                                                    <li><a href="index.php?act=login"><span>Đăng nhập</span></a></li>
                                                    <li><a href="index.php?act=register"><span>Đăng kí</span></a></li>
                                                </ul>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
     