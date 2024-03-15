<?php

require "../global.php";
require "../model/pdo.php";
require "../model/sanpham.php";
require "../model/bienthe.php";
require "../model/danhmuc.php";
require "../model/thuonghieu.php";
require "header.php";


if (isset($_GET['act'])) {
  $act = $_GET['act'];

  switch ($act) {

      // sản phẩm
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
      // add sản phẩm
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
      // update sp
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
        delete_sp($id);
       
     


      break;
    case 'list_bien_the':
      $id = $_GET['id'];
      $bienthe = get_bt_from_san_pham($id);
      



      break;


    default:
      require "home.php";
  }
}

else{
  require "home.php";
}



require "footer.php";
