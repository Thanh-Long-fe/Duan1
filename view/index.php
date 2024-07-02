<?php

session_start();
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';



include "../global.php";
include "../model/pdo.php";
include "../model/giohang.php";
include "../model/thanhtoan.php";
include "../model/thuonghieu.php";
include "../model/danhmuc.php";
include "../model/hoadon.php";
include "../model/binhluan.php";
include "../model/feedback.php";
include "../model/khachhang.php";
include "../model/sanpham.php";
include "../model/bienthe.php";
$listthuonghieu = loadall_thuonghieu();
$listdanhmuc = loadall_danhmuc();
include "header.php";
//controler


    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'login':
               if (!isset($_SESSION['user'])) {
                include "taikhoan/login.php";
                
               }else {
                header("location:index.php?act=info");
                exit();
               }
               
               
                break;
            case 'register':
                if (isset($_POST['register']) && ($_POST['register'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $email = $_POST['email'];
                    $mat_khau = $_POST['mat_khau'];
                    try {
                        insert_taikhoan($ho_ten, $ten_dang_nhap, $email, $mat_khau);
                        $id_user = get_nd_id($ten_dang_nhap, $email, $mat_khau);
                        create_new_cart($id_user['id_nguoi_dung']);
                        $_SESSION['toast'] = "dang_ki";
                    } catch (\Throwable $th) {
                        $_SESSION['toast'] = "loi_dang_ki";
                    }
                }
                include "taikhoan/register.php";
                break;
            case 'dangnhap':
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['mat_khau'];
    
                    if (is_array(check_email($email))) {
                        $checkuser = check_email($email);
                        if ($email = $checkuser['email'] && $pass == $checkuser['mat_khau']) {
                            if ($checkuser['status'] == 0) {
                                $_SESSION['user'] = $checkuser;
                                $_SESSION['toast'] = "dang_nhap";
                                header('location: index.php');
                                exit();
                            } else {
                                $_SESSION['toast'] = "khoa";;
                            }
                        } else {
                            $_SESSION['toast'] = "ko_ton_tai";
                        }
                    } else {
                        $nd = check_user($email);
                        if (is_array($nd)) {
                            if ($email == $nd['ten_dang_nhap'] && $pass == $nd['mat_khau']) {
                                if ($checkuser['status'] == 0) {
                                    $_SESSION['user'] = $nd;
                                    $thongbao = "Đã đăng nhập thành công";
                                    header('location: index.php');
                                    exit();
                                } else {
                                    $_SESSION['toast'] = "khoa";;
                                }
                            } else {
                                $_SESSION['toast'] = "ko_ton_tai";
                            }
                        } else {
                            $_SESSION['toast'] = "ko_ton_tai";
                        }
                    }
                }
                include "taikhoan/register.php";
                break;
    
            case 'out':
                unset($_SESSION['user']);
                $_SESSION['toast'] = "dang_xuat";
                header('location: index.php');
                exit();
                break;
            case '':
                break;
            case 'info':
                $don_hang = get_hoa_don_view($_SESSION['user']['id_nguoi_dung']);
    
                include "taikhoan/info.php";
                break;
            case 'view_hd':
    
                $don_hang = get_ct($_GET['id']);
                require "taikhoan/chi_tiet_don.php";
    
                break;
            case 'search':
    
    
                if (isset($_GET['key'])) {
                    $key = $_GET['key'];
    
                    $product = sanpham_get_by_key($key);
                    $url = "index.php?key=$key&act=search";
                    $dm_ = dem_dm();
                    $th_ = dem_th();
                    include "sanpham/sanpham.php";
                }
    
    
    
    
    
                break;
    
    
    
    
            case 'danh_muc':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = get_sp_bt_dm($id);
                    
                    if (!empty($product)) {
                        $dm_ = dem_dm();
                        $th_ = dem_th();
                        $url = "index.php?act=thuong_hieu&id=$id";
                        
                        include "sanpham/sanpham.php";
                    } else {
                        $_SESSION['toast'] = "k_sp";
                        $product = top8();
                        include "trangchu/main.php";
                    };
                }
    
                break;
    
            case 'thuong_hieu':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = get_sp_bt_th($id);
    
                    if (!empty($product)) {
                        $url = "index.php?act=thuong_hieu&id=$id";
                        $dm_ = dem_dm();
                        $th_ = dem_th();
                        include "sanpham/sanpham.php";
                        
                    } else {
                        $thongbao = "Không có sản phẩm nào";
                        $product = top8();
                        include "trangchu/main.php";
                    }
                }
    
                break;
            case 'sanpham':
                    $dm_ = dem_dm();
                    $th_ = dem_th();
                $product = get_all_sp_view();
                
                $url = "index.php?act=sanpham";
                
                include "sanpham/sanpham.php";
                break;
            case 'da_nhan':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    da_nhan($id);
                    $_SESSION['toast'] = "da_nhan";
                    $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                    header('Location:' . $previous_url);
                    exit();
                }
                break;
            case "deletebinhluan":
                if (isset($_GET["id"]) && $_GET["id"]) {
                    $idbl = $_GET["id"];
                    deletebinhluan($idbl);
                }
                $listbl = loadallbinhluan();
                $_SESSION['toast'] = "deletebinhluan";
                $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                header('Location:' . $previous_url);
                exit();
                break;
            case 'add_cart':
    
    
                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    if (isset($_SESSION['user'])) {
    
    
                        if (is_array($_SESSION['user']) && !empty($_SESSION['user'])) {
                            $id_sp = $_POST['id'];
    
                            $id_color = $_POST['id_color'];
                            $so_luong = $_POST['so_luong'];
                            $id_size = $_POST['id_size'];
    
                            $id_cart = get_id_cart_by_user($_SESSION['user']['id_nguoi_dung']);
                            $_SESSION['toast'] = "add_cart";
                            $id_bien_the_san_pham = get_id_bt_by_cart($id_sp, $id_color, $id_size);
    
                            $data_cart = select_gio_hang($_SESSION['user']['id_nguoi_dung']);
                            $check = true;
                            foreach ($data_cart as $data) {
                                if ($data['id_bien_the'] == $id_bien_the_san_pham['id_bien_the']) {
                                    update_so_luong($so_luong, $id_bien_the_san_pham['id_bien_the'], $_SESSION['user']['id_nguoi_dung']);
                                    $check = false;
                                    break;
                                }
                            }
    
                            if ($check) {
                                add_cart($id_bien_the_san_pham['id_bien_the'], $id_cart['id_gio_hang'], $so_luong);
                            }
    
                            header("location:index.php?act=ctsp&id_sp=$id_sp");
                            exit();
                        } else {
                            $_SESSION['toast'] = "error";
                            header("location:index.php?act=login");
                            exit();
                        }
                    } else {
                        $_SESSION['toast'] = "error";
                        header("location:index.php?act=login");
                        exit();
                    }
                }
    
    
                break;
            case 'delete_cart':
    
                if (is_array($_SESSION['user']) && !empty($_SESSION['user']['id_nguoi_dung']) && isset($_GET['id_cart'])) {
                    $_SESSION['toast'] = "delete_cart";
                    $check_cart = check_user_cart($_SESSION['user']['id_nguoi_dung']);
                    if ($check_cart && $_GET['id_cart'] == $check_cart['id_gio_hang'] && $check_cart['id_nguoi_dung'] == $_SESSION['user']['id_nguoi_dung']) {
                        delete_cart($_GET['id_ct']);
    
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location:' . $previous_url);
                        exit();
                    }
                }
    
    
                break;
            case 'delete_cart_':
    
                if (is_array($_SESSION['user']) && !empty($_SESSION['user']['id_nguoi_dung']) && isset($_GET['id_cart'])) {
                    $_SESSION['toast'] = "delete_cart";
                    $check_cart = check_user_cart($_SESSION['user']['id_nguoi_dung']);
                    if ($check_cart && $_GET['id_cart'] == $check_cart['id_gio_hang'] && $check_cart['id_nguoi_dung'] == $_SESSION['user']['id_nguoi_dung']) {
                        delete_cart($_GET['id_ct']);
    
                        header('Location:index.php?act=giohang');
                        exit();
                    }
                }
    
    
                break;
    
            case 'giohang':
                $sanpham = get_sp_cart($_SESSION['user']['id_nguoi_dung']);
                include "card/giohang.php";
                break;
    
            case 'check':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
                    $email = $_POST['email'];
                    $kq = select_user_by_email($email);
                    if (is_array($kq) && !empty($kq)) {
                        $random_code = random_pass(6);
    
                        $mail = new PHPMailer(true);
    
                        try {
    
                            // Cấu hình để sử dụng SMTP
                            $mail->isSMTP();
                            $mail->SMTPDebug = 0;
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'bocanteam133@gmail.com'; // Thay thế bằng địa chỉ email Gmail của bạn
                            $mail->Password = 'jqbumylzzsiloxit'; // Thay thế bằng mật khẩu của bạn
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587;
    
                            // Cấu hình thông tin người gửi
                            $mail->setFrom('bocanteam133@gmail.com', 'ADMIN');
                            // Cấu hình thông tin người nhận
                            $mail->addAddress($email, $kq['email']);
    
                            // Đặt tiêu đề và nội dung email
                            $mail->Subject = 'Dat lai mat khau';
                            $mail->Body = 'Mã xác nhận là :' . $random_code;
    
                            // Gửi email
                            $mail->send();
                            $_SESSION['code'] = $random_code;
                            $_SESSION['toast'] = "da_gui";
    
                            include "taikhoan/xac_nhan.php";
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            $_SESSION['toast'] = "error";
                        }
                    } else {
                        $_SESSION['toast'] = "email_err";
                        include "taikhoan/login.php";
                    }
                }
    
                break;
            case 'confirm':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $email = $_POST['email'];
                    $code = $_POST['code'];
                    if ($code === $_SESSION['code']) {
                        try {
                            doi_mk_user($code, $email);
                            unset($_SESSION['code']);
                            $_SESSION['toast'] = "doi_tc";
                            include "taikhoan/login.php";
                        } catch (\Throwable $th) {
                            $_SESSION['toast'] = "error";
                            include "taikhoan/xac_nhan.php";
                        }
                    } else {
                        $_SESSION['toast'] = "kcx";
    
                        include "taikhoan/xac_nhan.php";
                    }
                }
    
                break;
            case 'bill':
                include "card/bill.php";
                break;
            case 'checkout':
                if (isset($_SESSION['user'])) {
                    $product = get_sp_cart($_SESSION['user']['id_nguoi_dung']);
                    $pay = get_pay();
        
        
                    if (!empty($product)) {
                        $ship = 50000;
                        $free = 0;
                        include "checkout/checkout.php";
                    } else {
                        $_SESSION['toast'] = "no_pro";
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location: ' . $previous_url);
                        exit();
                    }
                }
                else{
                    include "trangchu/error.php";
                }
                    
                  
                
              
    
                break;
            case 'quen_mk':
                include "taikhoan/quen_mk.php";
                break;
            case 'add_cmt':
                if (isset($_SESSION['user'])) {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $_SESSION['toast'] = "add_cmt";
                        $name = $_POST['ho_ten'];
                        $tieu_de = $_POST['tieu_de'];
                        $noi_dung = $_POST['noi_dung'];
                        $ngay_dat = date("Y-m-d");
                        $id_sp = $_POST['id_sp'];
                        if (isset($_POST['rating'])) {
                            $rating = $_POST['rating'];
                        } else {
                            $rating = 0;
                        }
        
        
                        $unique_rating = unique_rating($_SESSION['user']['id_nguoi_dung'], $id_sp);
                        them_binh_luan($tieu_de, $noi_dung, $ngay_dat, $id_sp, $_SESSION['user']['id_nguoi_dung'], $rating);
                        header("location:index.php?act=ctsp&id_sp=$id_sp");
                    }
                    else{
                        require "trangchu/error.php";
                    }
                }
               
                break;
            case 'update':
                
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_SESSION['user'])) {
                        $id_nguoi_dung = $_POST['id_nguoi_dung'];
                        $ho_ten = $_POST['ho_ten'];
                        $dia_chi = $_POST['dia_chi'];
                        $sdt = $_POST['sdt'];
                        $email = $_POST['email'];
                        
                        $target_dir = "../upload/";
                        $avatar = $_FILES['avatar'];
                        if (!empty($avatar['name'])) {
                            $hinh_anh = uploadImage($avatar, $target_dir);
                            update_taikhoan_all($id_nguoi_dung, $ho_ten, $dia_chi, $sdt, $email,  $hinh_anh);
                           
                            $_SESSION['user']['avatar'] = $hinh_anh;
                            $_SESSION['user']['ho_ten'] = $ho_ten;
                            $_SESSION['user']['dia_chi'] = $dia_chi;
                            $_SESSION['user']['sdt'] = $sdt;
                            $_SESSION['user']['email'] = $email;

                            
                        } else {
                            
                            update_taikhoan($id_nguoi_dung, $ho_ten, $dia_chi, $sdt, $email);
                            $_SESSION['user']['ho_ten'] = $ho_ten;
                            $_SESSION['user']['dia_chi'] = $dia_chi;
                            $_SESSION['user']['sdt'] = $sdt;
                            $_SESSION['user']['email'] = $email;
                        }
                        $_SESSION['toast'] = "update";
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location: ' . $previous_url);
                        exit();
                        
                    }
                    else{
                        require "trangchu/error.php";
                    }
                }
                include "taikhoan/info.php";
                break;
                case 'doi_mk':
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        if (isset($_SESSION['user'])) {      
                            $old = $_POST['mat_khau'];
                            $new = $_POST['mat_khau_new'];
                            $comfirm = $_POST['mat_khau_confirm'];

                            if ($old !== $_SESSION['user']['mat_khau']) {
                                $_SESSION['toast'] = "sai_mk_cu";
                                $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                                header('Location: ' . $previous_url);
                                exit();
                            }
                            else{
                                if ($new == $comfirm) {
                                doi_mk_($comfirm,$_SESSION['user']['id_nguoi_dung']);
                                $_SESSION['user']['mat_khau'] = $new;
                                $_SESSION['toast'] = "update";
                                $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                                header('Location: ' . $previous_url);
                                exit();
                                    
                                }
                                else{
                                    $_SESSION['toast'] = "error";
                                    $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                                    header('Location: ' . $previous_url);
                                    exit(); 
                                }
                            }
                        }
                    }
                             break;
            case 'ctsp':
                $id_sp = $_GET['id_sp'];
                $sp = get_one_sp($id_sp);
                $img = get_img_bt_from_sp($id_sp);
                $color = get_color_bien_the($id_sp);
                $size = get_size_bien_the($id_sp);
                $_size = json_encode($size);
                $_color = json_encode($color);
                $bienthe = data_size_color($id_sp);
                $_bienthe = json_encode($bienthe);
                $comment = get_all_bl($id_sp);
                $avg_sao = avg_rating($id_sp);
                $sl = dem_bl($id_sp);
                $san_pham_cung_loai = san_pham_cung_loai(get_id_dm_by_sp($id_sp)['id_danh_muc']);
                tang_so_luot_xem($id_sp);
                if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    $unique_rating = unique_rating($_SESSION['user']['id_nguoi_dung'], $id_sp);
                    $check_unique = true;
                    foreach ($unique_rating as $a) {
                        if ($a['rating'] >= 1) {
                            $check_unique = false;
                            break;
                        }
                    }
    
                    $check_buy = check_buy_product($_SESSION['user']['id_nguoi_dung'], $id_sp);
                }
                include "sanpham/sanphamct.php";
                break;
    
            case 'update_cart':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                    if (isset($_POST['quantity'])) {
    
                        foreach ($_POST['quantity'] as $product_id => $quantity) {
                            update_cart_user($quantity, $_SESSION['user']['id_nguoi_dung'], $product_id);
                            $sanpham = get_sp_cart($_SESSION['user']['id_nguoi_dung']);
                            
                        }
                            $_SESSION['toast'] = "update_cart";
                            header("location:index.php?act=giohang");
                            exit();
                    } else {
                        $_SESSION['toast'] = "no_pro";
                       
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location: ' . $previous_url);
                        exit();
                    }
                }
                break;
            case 'checkout_pay':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ho_ten = $_POST['ho_ten'];
                    $dia_chi = $_POST['dia_chi'];
                    $sdt = $_POST['sdt'];
                    $ghi_chu = $_POST['ghi_chu'];
                    $id_hd = $_POST['id_hoa_don'];
                    $sp_bt = $_POST['sp_bt'];
                    $gia = $_POST['gia'];
                    $monney = $_POST['monney'];
                    $payment_method = $_POST['payment_method'];
                    $currentDate = date('Y-m-d');
                    try {
                        add_dh($id_hd, $_SESSION['user']['id_nguoi_dung'], $ho_ten, $currentDate, $dia_chi, $sdt, $ghi_chu, $payment_method, "Đang chờ", $monney);
    
                        foreach ($sp_bt as $product_id => $quantity) {
                            $gia = $_POST['gia']["$product_id"];
                            add_ct($id_hd, $product_id, $quantity, $gia);
                        }
                        require "checkout/thanks.php";
                    } catch (\Throwable $th) {
                        require "checkout/fail.php";
                    }
                }
                break;
    
            case 'clear_cart':
                if (isset($_SESSION['user'])) {
                    clear_cart($_SESSION['user']['id_nguoi_dung']);
                    $sanpham = get_sp_cart($_SESSION['user']['id_nguoi_dung']);
                    include "card/giohang.php";
                } else {
                    $_SESSION['toast'] = "no_one";
                }
                break;
            case 'pay_info':
                require "checkout/thongtinthanhtoan.php";
                break;
            case 'thanks':
    
                if (isset($_GET['partnerCode']) && $_GET['resultCode'] == 0) {
                    $currentDate = date('Y-m-d');
                    add_dh($_GET['orderId'], $_SESSION['user']['id_nguoi_dung'], $_SESSION['order']['ho_ten'], $currentDate, $_SESSION['order']['dia_chi'],  $_SESSION['order']['sdt'],  $_SESSION['order']['ghi_chu'], $_SESSION['order']['payment_method'], 'Đang chờ', $_GET['amount']);
                    foreach ($_SESSION['order']['sp_bt'] as $product_id => $quantity) {
                        $gia = $_SESSION['order']['gia']["$product_id"];
                        add_ct($_GET['orderId'], $product_id, $quantity, $gia);
                    }
                    require "checkout/thanks.php";
                    unset($_SESSION['order']);
                } else {
                    require "checkout/fail.php";
                }
    
    
                break;
    
            case 'huy':
                tu_choi($_GET['id']);
                $_SESSION['toast'] = "huy_don";
                $previousUrl = $_SERVER['HTTP_REFERER'];
                header("location:$previousUrl");
                exit();
                break;
            case 'add_to_cart':
    
    
                if (isset($_SESSION['user'])) {
    
    
                    $_SESSION['toast'] = "add_cart";
                    $id = get_bt_by_sp($_GET['id_sp']);
                    $id_user = get_id_cart_by_user($_SESSION['user']['id_nguoi_dung']);
    
                    $data_cart = select_gio_hang($_SESSION['user']['id_nguoi_dung']);
                    $check = true;
                    foreach ($data_cart as $data) {
                        if ($data['id_bien_the'] == $id['id_bien_the']) {
                            update_so_luong(1, $id['id_bien_the'], $_SESSION['user']['id_nguoi_dung']);
                            $check = false;
                            $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                            header('Location: ' . $previous_url);
                            exit();
                            break;
                        }
                    }
    
                    if ($check) {
                        $_SESSION['toast'] = "add_cart";
                        add_cart($id['id_bien_the'], $id_user['id_gio_hang'], 1);
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location: ' . $previous_url);
                        exit();
                    }
                } else {
                    $_SESSION['toast'] = "no_one";
                    $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                    header('Location: ' . $previous_url);
                    exit();
                }
    
    
                break;
            case 'contact':
    
                require "contact/contact.php";
                break;
    
    
            case 'report':
                $_SESSION['toast'] = "baocao";
                $id = $_GET['id_bl'];
                bao_cao($id);
    
                $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                header('Location: ' . $previous_url);
                exit();
                break;
            case 'edit_cmt':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $nd = $_POST['noi_dung'];
                    $_SESSION['toast'] = "sua_cmt";
                    $id_cmt = $_POST['id_cmt'];
                    edit_cmt($nd, $id_cmt);
                    $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                    header('Location: ' . $previous_url);
                    exit();
                }
                break;
            case 'loc':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    
                    if (isset($_POST['dm'])) {
                        $dm = $_POST['dm'];
                    }
                    if (isset($_POST['th'])) {
                        $th = $_POST['th'];
                    }
                   
                    $giamin = $_POST['min'];
                    $giamax = $_POST['max'];
                    $dm_ = dem_dm();
                    $th_ = dem_th();
                    $product = get_all_sp_view();
                    require "sanpham/loc.php";
                   


                }
                break;


                case 'send_feedback':
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $name = $_POST['con_name'];
                        $email = $_POST['con_email'];
                        $subject =$_POST['con_subject'];
                        $message = $_POST['con_message'];
                        $ngay_dat = date("Y-m-d");
                        send_fb($name,$email,$message,$ngay_dat,$subject);
                        $_SESSION['toast'] ="fb";
                        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // URL mặc định nếu không có HTTP_REFERER
                        header('Location: ' . $previous_url);
                        exit();


                    }
                    break;
    
            default:
                $product = top8();
                $sanpham_sale = top10_sale();
                include "trangchu/main.php";
    
    
    
                break;
        }
    } else {
        $product = top8();
        $sanpham_sale = top10_sale();
        include "trangchu/main.php";
    }
    



include "footer.php";
ob_end_flush();
