<?php

require "../global.php";
require "../model/pdo.php";
require "../model/size.php";
require "../model/mau.php";
require "../model/sanpham.php";
require "../model/bienthe.php";
require "../model/danhmuc.php";
require "../model/thuonghieu.php";
require "../model/hoadon.php";
require "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'list_sanpham':
            $product = get_all();
            require "sanpham/list.php";
            break;
        case 'add_sanpham':
            $danhmuc = get_all_dm();
            $thuonghieu = get_all_thuonghieu();
            require "sanpham/add.php";
            break;
        case 'update_sanpham':
            $danhmuc = get_all_dm();
            $thuonghieu = get_all_thuonghieu();
            $id = $_GET['id'];
            $product = get_one_sp($id);
            require "sanpham/update.php";
            break;
        case 'add_sp':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_sp = $_POST['name'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $thuonghieu = $_POST['thuonghieu'];
                $danhmuc = $_POST['danhmuc'];
                $trangthai = $_POST['trangthai'];
                $file_img = $_FILES['anh_sp'];
                $hinh_anh = uploadImage($file_img, '../upload/');
                add_sp($ten_sp, $hinh_anh, $mota, $gia, $danhmuc, $thuonghieu, $trangthai, $soluong);
                $product = get_all();
                require "sanpham/list.php";
            }
            break;
        case 'update_sp':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $ten_sp = $_POST['name'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $thuonghieu = $_POST['thuonghieu'];
                $danhmuc = $_POST['danhmuc'];
                $trangthai = $_POST['trangthai'];
                $file_img = $_FILES['anh_sp'];
                if (!empty($file_img['name'])) {
                    $hinh_anh = uploadImage($file_img, '../upload/');
                    update_all($ten_sp, $hinh_anh, $mota, $gia, $danhmuc, $thuonghieu, $trangthai, $soluong, $id);
                } else {
                    update_one($ten_sp, $mota, $gia, $danhmuc, $thuonghieu, $trangthai, $soluong, $id);
                }
                $product = get_all();
                require "sanpham/list.php";
            }
            break;
        case 'delete_sp':
            $id = $_GET['id'];
            if (delete_mem($id)) {
                echo "<script>setTimeout(function(){
                    alert('Đã xóa thành công !!!')
                },800)</script>";
            } else {
                echo "<script>setTimeout(function(){
                    alert('Đang có đơn hàng sản phảm này !!!')
                },800)</script>";
            }
            $product = get_all();
            require "sanpham/list.php";
            break;
        case 'list_bien_the':
            $id = $_GET['id'];
            $bienthe = get_bt_from_san_pham($id);
            require 'bienthe/list.php';
            break;
        case 'add_bienthe':
            $size = get_size();
            $color = get_color();
            require "bienthe/add.php";
            break;
        case 'add_bt':
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $size = $_POST['size'];
                $color = $_POST['color'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $anh_sp = $_FILES['anh_sp'];
                $status = $_POST['trangthai'];
                $id_sp = $_POST['id_sp'];
                $hinh_anh = uploadImage($anh_sp, '../upload/');
                add_bien_the($id_sp, $size, $color, $gia, $hinh_anh, $soluong, $status);
            }
            break;
        case 'update_bt':
            $size = get_size();
            $color = get_color();
            $bienthe = get_bien_the_one($_GET['id']);
            require "bienthe/update.php";
            break;
        case 'btn_update_bt':
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $size = $_POST['size'];
                $color = $_POST['color'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $anh_sp = $_FILES['anh_sp'];
                $status = $_POST['trangthai'];
                $id_sp = $_POST['id_sp'];
                $id_bt = $_POST['id_bt'];
                if (!empty($anh_sp['name'])) {
                    $hinh_anh = uploadImage($anh_sp, '../upload/');
                    edit_bt_all($id_sp, $size, $color, $gia, $hinh_anh, $soluong, $status, $id_bt);
                } else {
                    edit_bt_one($id_sp, $size, $color, $gia, $soluong, $status, $id_bt);
                }
                $_GET['id'] = $id_sp;
                $bienthe = get_bt_from_san_pham($id_sp);
                require 'bienthe/list.php';
            }
            break;
        case 'delete_bt':
            $id = $_GET['id'];
            if (delete_bt_sp($id)) {
                echo "<script>setTimeout(function(){
                            alert('Đã xóa thành công !!!')
                        },800)</script>";
            } else {
                echo "<script>setTimeout(function(){
                            alert('Đang có đơn hàng sản phẩm này !!!')
                        },800)</script>";
            }
            $bienthe = get_bt_from_san_pham($id);
            require 'bienthe/list.php';

            break;

        case 'list_hoadon':


            $hoadon = get_hoa_don();
            require "hoadon/list.php";

            break;
        case 'list_chitiet':

            $id = $_GET['id'];
            $chi_tiet = get_ct($id);
            require "chitiet/list.php";

            break;

        case 'update_dh':


            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $id = $_POST['id_hd'];
                $trangthai = $_POST['trang_thai'];
                update_giao_hang($trangthai, $id);
                echo "<script>setTimeout(function(){
                            alert('Cập nhật thành công !!!')
                        },800)</script>";

                        $hoadon = get_hoa_don();
                        require "hoadon/list.php";
            }



            break;
        default:
            require "home.php";
            break;
    }
} else {
    require "home.php";
}

require "footer.php";
