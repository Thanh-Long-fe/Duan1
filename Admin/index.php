<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
ob_start();

require "../global.php";


if (!is_admin_logged_in()) {
    header("location:../view/index.php");
    die;
}

require "../model/pdo.php";
require "../model/size.php";
require "../model/feedback.php";
require "../model/mau.php";
require "../model/sanpham.php";
require "../model/bienthe.php";
require "../model/danhmuc.php";
require "../model/thuonghieu.php";
require "../model/hoadon.php";
require "../model/binhluan.php";
require "../model/khachhang.php";
require "../model/thongke.php";
require "../model/thanhtoan.php";
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
                $sale = $_POST['sale'];
                try {
                    add_sp($ten_sp, $hinh_anh, $mota, $gia, $danhmuc, $thuonghieu, $trangthai, $soluong,$sale);
                    $fainal = get_sp_cuoi();
                    add_bien_the_mac_dinh($fainal['id'], $gia, $soluong);
                    $_SESSION['toast'] = "add";
                } catch (\Throwable $th) {
                    $_SESSION['toast'] = "error";
                }

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
                $sale = $_POST['sale'];
                $file_img = $_FILES['anh_sp'];
                if (!empty($file_img['name'])) {
                    $hinh_anh = uploadImage($file_img, '../upload/');
                    update_all($ten_sp, $hinh_anh, $mota, $gia, $danhmuc, $thuonghieu, $soluong,$sale, $id);
                } else {
                    update_one($ten_sp, $mota, $gia, $danhmuc, $thuonghieu, $soluong,$sale, $id);
                }
                $_SESSION['toast'] = "update";
                $product = get_all();
                require "sanpham/list.php";
            }
            break;
        case 'delete_sp':
            $id = $_GET['id'];
            if (delete_mem($id)) {
                $_SESSION['toast'] = "an";
            } else {
                $_SESSION['toast'] = "dang_cho";
            }
            $product = get_all();
            require "sanpham/list.php";
            break;
        case 'view_sp':
            $id = $_GET['id'];
            view_sp($id);
            $_SESSION['toast'] = "hien";
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
                try {
                    add_bien_the($id_sp, $size, $color, $gia, $hinh_anh, $soluong, $status);
                    $_SESSION['toast'] = "add";
                } catch (\Throwable $th) {
                    $_SESSION['toast'] = "da_co";
                }


                $_GET['id'] = $id_sp;
                $bienthe = get_bt_from_san_pham($id_sp);
                require 'bienthe/list.php';
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
                $_SESSION['toast'] = "update";
                $_GET['id'] = $id_sp;
                $bienthe = get_bt_from_san_pham($id_sp);
                require 'bienthe/list.php';
            }
            break;
        case 'delete_bt':
            $id = $_GET['id'];
            $id_bt = $_GET['id_bt'];

            if (delete_bt_sp($id_bt)) {
                $_SESSION['toast'] = "an";
            } else {
                $_SESSION['toast'] = "dang_cho";
            }
            $bienthe = get_bt_from_san_pham($id);
            require 'bienthe/list.php';

            break;

        case 'view_bt':
            $id = $_GET['id'];
            $id_bt = $_GET['id_bt'];
            view_bt($id_bt);
            $_SESSION['toast'] = "hien";
            $bienthe = get_bt_from_san_pham($id);
            require "bienthe/list.php";
            break;

        case 'list_hoadon':
            $so_dvc = dang_van_chuyen();
            $so_xl = dang_xu_ly();
            $so_dc = dang_cho();
            $da_huy = da_huy();
            $da_giao = da_giao();

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
                
                    if (!empty($trangthai)) {
                        update_giao_hang($trangthai, $id);
                        $_SESSION['toast'] = "update";
                        $hoadon = get_hoa_don();
                        $previousUrl = $_SERVER['HTTP_REFERER'];
                        header("location:$previousUrl");
                        exit();
                    }
                    else{
                        $_SESSION['toast'] = "error";
                    }
                   
                
                
               

             
            }



            break;
           
            case 'pttt':
            $listpttt = loadallpttt();
            include "thanhtoan/list.php";
            break;

        case 'addpttt':
            require "thanhtoan/add.php";
            break;

        case 'btn_addpttt':


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_thanh_toan = $_POST['ten_thanh_toan'];
                insert_pttt($ten_thanh_toan);
                $_SESSION['toast'] = "add";
                $listpttt = loadallpttt();
                include "thanhtoan/list.php";
            }


            break;
        case 'suapttt':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sua_pttt = sua_pttt($_GET['id']);
                require "thanhtoan/update.php";
            }
            break;
        case 'updatepttt':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_thanh_toan = $_POST['ten_thanh_toan'];
                $id_thanh_toan = $_POST['id_thanh_toan'];
                update_pttt($id_thanh_toan, $ten_thanh_toan);
                $_SESSION['toast'] = "update";
                $listpttt = loadallpttt();
                include "thanhtoan/list.php";
            }
            break;


            // Phúc

        case 'danhmuc':
            $listdm = loadalldanhmuc();
            include "danhmuc/list.php";
            break;

        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendanhmuc = $_POST['ten_danh_muc'];

                insert_danhmuc($tendanhmuc);
                $_SESSION['toast'] = "add";
            }
            include "danhmuc/add.php";
            break;

        case 'suadm':
            $iddanhmuc = $_REQUEST['id'];
            $listdm = load_dm_byId($iddanhmuc);

            include "danhmuc/update.php";
            break;
        case 'updatedm':
           
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $iddanhmuc = $_POST['id_danh_muc'];
                $tendanhmuc = $_POST['ten_danh_muc'];

                update_danhmuc($tendanhmuc, $iddanhmuc);
                $_SESSION['toast'] = "update";
                $listdm = loadalldanhmuc();
                include "danhmuc/list.php";
                break;
            }



        case "deletedanhmuc":

            if (isset($_GET["id"]) && $_GET["id"]) {
                $iddm = $_GET["id"];
                if (an_dm($iddm)) {
                    $_SESSION['toast'] = "an";
                } else {
                    $_SESSION['toast'] = "ko_the";
                }
            }
            $listdm = loadalldanhmuc();
            include "danhmuc/list.php";
            break;

        case 'binhluan':
            $listbl = loadallbinhluan();
            include "binhluan/list.php";
            break;
        case 'don_hang_theo_ngay':
            $don_hang = don_dang_theo_ngay();
            include "thongke/don_hang_theo_ngay.php";
            break;
        case 'don_hang_theo_thang':
            $don_hang = don_dang_theo_thang();
            $result = $don_hang;
            $data = [];
            foreach ($result as $row) {
                $data[$row['thang']] = $row['so_luong_hoa_don'];
            }
            $json_data = json_encode($data);
            include "thongke/don_hang_theo_thang.php";
            break;

        case "deletebinhluan":
            if (isset($_GET["id"]) && $_GET["id"]) {
                $idbl = $_GET["id"];
                deletebinhluan($idbl);
                $_SESSION['toast'] = "delete";
            }
            $listbl = loadallbinhluan();
            include "binhluan/list.php";
            break;
            //Huy


        case 'dskh':
            $listtk = loadalltk();
            include "khachhang/list.php";
            break;
           
        case 'mau':
            $listmau = loadallmau();
            include "mau/list.php";
            break;
        case 'addmau':


            require "mau/add.php";


            break;

        case 'btn_addmau':


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_mau = $_POST['ten_mau'];
                insert_mau($ten_mau);
                $_SESSION['toast'] = "add";
                $listmau = loadallmau();
                include "mau/list.php";
            }


            break;
        case 'suamau':
            if (isset($_GET['id_mau']) && ($_GET['id_mau'] > 0)) {
                $suamau = sua_mau($_GET['id_mau']);
                require "mau/update.php";
            }

            break;
        case 'updatemau':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_mau = $_POST['ten_mau'];
                $id_mau = $_POST['id_mau'];
                update_mau($id_mau, $ten_mau);
                $thongbao = "Cập nhật thành công";
                $listmau = loadallmau();
                require "mau/list.php";
            }

            break;

        case 'xoamau':
            if (isset($_GET['id_mau']) && ($_GET['id_mau'] > 0)) {
                if (delete_mau($_GET['id_mau'])) {
                    $_SESSION['toast'] = "delete";
                } else {
                    $_SESSION['toast'] = "ko_the";
                }
            }

            $listmau = loadallmau();
            include "mau/list.php";
            break;
        case 'size':
            $listsize = loadallsize();
            include "size/list.php";
            break;

        case 'addsize':

            include "size/add.php";
            break;
        case 'suasize':
            if (isset($_GET['id_size']) && ($_GET['id_size'] > 0)) {
                $suasize = sua_size($_GET['id_size']);
            }
            include "size/update.php";
            break;
        case 'updatesize':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_size = $_POST['ten_size'];
                $id_size = $_POST['id_size'];
                update_size($id_size, $ten_size);
                $_SESSION['toast'] = "update";
                $listsize = loadallsize();
                include "size/list.php";
            }
            
            break;
        case 'xoasize':
            if (isset($_GET['id_size']) && ($_GET['id_size'] > 0)) {
                if (delete_size($_GET['id_size'])) {
                    $_SESSION['toast'] = "an";
                } else {
                    $_SESSION['toast'] = "ko_the";
                }
            }
            $listsize = loadallsize();
            include "size/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/thongke.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'block':

            $id = $_GET['id'];
            ban_acc($id);
            $listtk = loadalltk();
            $_SESSION['toast'] = "block";

            require "khachhang/list.php";
            break;
        case 'btn_add_size':


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['ten_size'];

                add_size($name);


                $_SESSION['toast'] = "add";
            }
            $listsize = loadallsize();
            require "size/list.php";
            break;


        case 'list_hide_sp':
            $product = list_hide_sp();


            require "list_ban_and_hide/list_hide_sp.php";
            break;
        case 'list_ban_acc':

            $list = list_banner();
            require "list_ban_and_hide/list_ban_acc.php";
            break;


        case 'list_hide_dm':

            $listdm = get_dm_hide();
            require "list_ban_and_hide/list_hide_dm.php";
            break;


        case 'view_danhmuc':

            $id = $_GET['id'];
            set_dm_hide($id);
            $listdm = get_dm_hide();
            $_SESSION['toast'] = "hien";;
            require "list_ban_and_hide/list_hide_dm.php";
            break;

        case 'open_acc':
            $id = $_GET['id'];
            $list = open_banner($id);
            $_SESSION['toast'] = "open";
            $list = list_banner();
            require "list_ban_and_hide/list_ban_acc.php";
            break;






        case 'list_hide_th':

            $th = get_th_hide();
            require "list_ban_and_hide/list_hide_th.php";
            break;
        case 'list_th_sp':
            $id = $_GET['id'];
            $product = get_list_th_sp($id);
            require "thuonghieu/list_sp_th.php";
            break;


        case 'list_th':

            $th = get_all_thuonghieu();
            require "thuonghieu/list.php";
            break;

        case 'add_th':


            require "thuonghieu/add.php";
            break;
        case 'update_th':
            $id = $_GET['id'];
            $th = get_one_thuonghieu($id);


            require "thuonghieu/update.php";




            break;
            case 'next_bl':
                $id = $_GET['id'];
                bo_qua($id);
                
                $report = get_bl_rp();
                require "binhluan/report.php";
                break;

        case 'btn_update_th':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $id = $_POST['id'];
                update_th($name, $id);
                $th = get_all_thuonghieu();

                $_SESSION['toast'] = "update";

                require "thuonghieu/list.php";
            }



            break;
            case 'feedback':
                $fb = get_fb();
                require "feedback/list.php";
                break;


        case 'btn_add_th':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];

                add_th($name);
                $th = get_all_thuonghieu();
                $_SESSION['toast'] = "add";
                require "thuonghieu/list.php";
            }

            break;

        case 'delete_th':

            $id = $_GET['id'];
            if (an_th($id)) {
                $_SESSION['toast'] = "an";
            } else {
                $_SESSION['toast'] = "ko_the";
            }

            $th = get_th_hide();
            require "list_ban_and_hide/list_hide_th.php";




            break;
        case 'view_th':

            $id = $_GET['id'];
            set_th_view($id);
            $th = get_th_hide();
            require "list_ban_and_hide/list_hide_th.php";

            $_SESSION['toast'] = "hien";

            break;
        case 'list_tk_dh_ngay':
            if (isset($_GET['ngay'])) {
                $date = $_GET['ngay'];
                $hoadon = get_hoa_don_by_date($date);
            }


            require "thongke/list.php";


            break;
            
                case 'dang_cho':
                    $so_dvc = dang_van_chuyen();
                    $so_xl = dang_xu_ly();
                    $so_dc = dang_cho();
                    $da_huy = da_huy();
                    $da_giao = da_giao();
                    
                    $hoadon = get_dang_cho();
                require "hoadon/list_cho.php";
                                
        
        
                break;

                case 'van_chuyen':
                    $so_dvc = dang_van_chuyen();
                    $so_xl = dang_xu_ly();
                    $so_dc = dang_cho();
                    $da_huy = da_huy();
                    $da_giao = da_giao();
                    $hoadon = get_dang_van_chuyen();
        
                require "hoadon/list.php";
                break;
                case 'dang_xu_ly':
                    $so_dvc = dang_van_chuyen();
                    $so_xl = dang_xu_ly();
                    $so_dc = dang_cho();
                    $da_huy = da_huy();
                    $da_giao = da_giao();
                         $hoadon = get_dang_xu_ly();       
        
                require "hoadon/list.php";
                break;
                case 'huy_don':
                    $so_dvc = dang_van_chuyen();
                    $so_xl = dang_xu_ly();
                    $so_dc = dang_cho();
                    $da_huy = da_huy();
                    $da_giao = da_giao();
                  $hoadon = get_da_huy();              
        
                require "hoadon/list.php";
                break;
                case 'da_giao':
                    $so_dvc = dang_van_chuyen();
                    $so_xl = dang_xu_ly();
                    $so_dc = dang_cho();
                    $da_huy = da_huy();
                    $da_giao = da_giao();
                    $hoadon = get_da_giao();         
        
                require "hoadon/list.php";
                break;
                case 'xac_nhan':
                        xac_nhan($_GET['id']);
                        $_SESSION['toast'] = "xac_nhan";
                        $previousUrl = $_SERVER['HTTP_REFERER'];
                        header("location:$previousUrl");
                        exit();
                break;
                case 'huy':
                    tu_choi($_GET['id']);        
                    $_SESSION['toast'] = "tu_choi";
                   $previousUrl = $_SERVER['HTTP_REFERER'];
                header("location:$previousUrl");   
                exit();    
                break;
                    case 'list_report':
                        $report = get_bl_rp();
                        require "binhluan/report.php";
                     
                        break;

        case 'list_tk_dh_thang':
            if (isset($_GET['thang'])) {
                $month = $_GET['thang'];
                $hoadon = get_hoa_don_by_thang($month);
                
                require "thongke/list.php";
            }
            break;

        case 'an_tt':
            if (isset($_GET['id'])) {
                an_tt($_GET['id']);
                $_SESSION['toast'] = "an";
                $previousUrl = $_SERVER['HTTP_REFERER'];
                header("location:$previousUrl");  
                exit();

            }
            break;
            case 'hien_tt':
                if (isset($_GET['id'])) {
                    hien_tt($_GET['id']);
                    $_SESSION['toast'] = "hien";
                    $previousUrl = $_SERVER['HTTP_REFERER'];
                    header("location:$previousUrl");  
                    exit();
    
                }
                break;

            









        default:
            $result = tien_theo_thang();
            $data = [];
            foreach ($result as $row) {
                $data[$row['thang']] = $row['tong_tien_thang'];
            }

            // Chuyển đổi mảng PHP thành chuỗi JSON để sử dụng trong biểu đồ
            $json_data = json_encode($data);





            $huy = tong_don_bi_huy();
            $tong_don_hang = tong_don();
            $tong_don_tc = tong_don_thanh_cong();
            $tong_sp_dang_ban = tong_sp();
            $user = new_user();
            $tong_so_nguoi_dung = tong_nd();
            require "home.php";
            break;
    }
} else {
    $result = tien_theo_thang();
    $data = [];
    foreach ($result as $row) {
        $data[$row['thang']] = $row['tong_tien_thang'];
    }

    // Chuyển đổi mảng PHP thành chuỗi JSON để sử dụng trong biểu đồ
    $json_data = json_encode($data);





    $huy = tong_don_bi_huy();
    $tong_don_hang = tong_don();
    $tong_don_tc = tong_don_thanh_cong();
    $tong_sp_dang_ban = tong_sp();
    $user = new_user();
    $tong_so_nguoi_dung = tong_nd();
    require "home.php";

}

require "footer.php";


ob_end_flush();
