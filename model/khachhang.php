<?php

function ban_acc($id){
    $sql = "UPDATE nguoidung SET `status` = 1 WHERE id_nguoi_dung = ?";
    return pdo_execute($sql,$id);
}


function list_banner()
{
    $sql = "SELECT * FROM nguoidung  WHERE `status` = 1 order by id_nguoi_dung" ;
    
    return pdo_query($sql);
}

function open_banner($id)
{
    $sql = "UPDATE nguoidung SET `status` = 0 WHERE id_nguoi_dung = ?" ;
    
    return pdo_query($sql,$id);
}

function loadalltk()
{
    $sql = "SELECT * FROM nguoidung order by id_nguoi_dung ";
    $listtk = pdo_query($sql);
    return $listtk;
}
function sua_tk($id_nguoi_dung)
{
    $sql = "SELECT * FROM nguoidung WHERE id_nguoi_dung=" . $id_nguoi_dung;
    $suatk = pdo_query_one($sql);
    return $suatk;
}
function update_tk($id_nguoi_dung, $ho_ten, $dia_chi, $sdt, $email, $ten_dang_nhap, $mat_khau, $quyen, $avatar)
{
    if ($avatar != "") {
        # code...
        $sql = "UPDATE nguoidung SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt', email = '$email',ten_dang_nhap = '$ten_dang_nhap',mat_khau = '$mat_khau',quyen = '$quyen', avatar = '$avatar' WHERE id_nguoi_dung = '$id_nguoi_dung'";
    } else {
        $sql = "UPDATE nguoidung SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt', email = '$email',ten_dang_nhap = '$ten_dang_nhap',mat_khau = '$mat_khau',quyen = '$quyen', WHERE id_nguoi_dung = '$id_nguoi_dung'";
    }
    pdo_execute($sql);
}
function new_user(){
    $sql = "SELECT COUNT(*) AS so_luong_nguoi_dung
    FROM nguoidung
    WHERE MONTH(ngaytao) = MONTH(CURRENT_DATE()) AND YEAR(ngaytao) = YEAR(CURRENT_DATE());";
    return pdo_query_one($sql);
}

function tong_nd(){
    $sql = "SELECT COUNT(*) AS total_users FROM nguoidung;
    ";
    return pdo_query_one($sql);
}

function check_pass($mat_khau)
{
    $sql = "SELECT * FROM nguoidung WHERE mat_khau = '$mat_khau' ";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function check_email($email)
{
    $sql = "SELECT * FROM nguoidung WHERE email =  '$email'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function check_user($ten_dang_nhap)
{
    $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = '$ten_dang_nhap' ";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function insert_taikhoan($ho_ten, $ten_dang_nhap, $email, $mat_khau)
{
    $sql = "INSERT INTO nguoidung(ho_ten,ten_dang_nhap,email,mat_khau) VALUES ('$ho_ten','$ten_dang_nhap', '$email', '$mat_khau')";
    pdo_execute($sql);
}

function update_taikhoan($id_nguoi_dung, $ho_ten, $dia_chi, $sdt, $email)
{
   

        $sql = "UPDATE nguoidung SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt', email = '$email' WHERE id_nguoi_dung = '$id_nguoi_dung'";
        pdo_execute($sql);
       
    
}
function update_taikhoan_all($id_nguoi_dung, $ho_ten, $dia_chi, $sdt, $email,  $avatar){
      
      $sql = "UPDATE nguoidung SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt', email = '$email', avatar = '$avatar' WHERE id_nguoi_dung = '$id_nguoi_dung'";
      pdo_execute($sql);
}
function get_nd_id($tk,$email,$mat_khau){
    $sql = "SELECT id_nguoi_dung FROM nguoidung WHERE ten_dang_nhap = ? AND email = ? AND mat_khau = ?;";
    return pdo_query_one($sql,$tk,$email,$mat_khau);
}
function select_user_by_email($email){
    $sql = "SELECT * FROM `nguoidung` WHERE email = ?";
    return pdo_query_one($sql,$email);
}
function doi_mk_user($pass,$email){
    $sql = "UPDATE `nguoidung` SET `mat_khau`= '$pass' WHERE email = '$email'";
    return pdo_execute($sql);
}
function doi_mk_($pass,$id){
    $sql = "UPDATE `nguoidung` SET `mat_khau`= ? WHERE id_nguoi_dung = ?";
    return pdo_execute($sql,$pass,$id);
}