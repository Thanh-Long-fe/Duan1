<?php

function get_sp_cart($id){
    $sql = "SELECT sp.*,gh.id_gio_hang AS 'id_cart',s.ten_size,m.ten_mau,ctgh.so_luong AS 'so_luong_cart',bt.gia AS 'gia_bt',bt.hinh_anh AS 'bt_hinh_anh', gh.id_nguoi_dung,bt.id_bien_the,ctgh.id AS 'id_ct',bt.so_luong as 'so_luong_' FROM sanpham sp JOIN bienthe bt ON sp.id = bt.id_san_pham JOIN mau m ON m.id_mau = bt.id_mau JOIN `size` s ON s.id_size = bt.id_size JOIN chitietgiohang ctgh ON ctgh.id_bien_the = bt.id_bien_the JOIN giohang gh ON gh.id_gio_hang = ctgh.id_gio_hang WHERE gh.id_nguoi_dung = ? AND sp.status = 0";
    return pdo_query($sql,$id);
}
function get_id_bt_by_cart($id_sp,$color,$size){
    $sql = "SELECT id_bien_the FROM bienthe WHERE id_san_pham = ? AND id_mau = ? AND id_size = ?";
    return pdo_query_one($sql,$id_sp,$color,$size);
}
function add_cart($id_bt,$id_gh,$sl){
    $sql = "INSERT INTO `chitietgiohang`( `id_bien_the`, `id_gio_hang`, `so_luong`) VALUES (?,?,?)";
    return pdo_execute($sql,$id_bt,$id_gh,$sl);

}
function get_id_cart_by_user($id){
    $sql = "SELECT `id_gio_hang` FROM `giohang` WHERE id_nguoi_dung = ?";
    return pdo_query_one($sql,$id);
}
function select_gio_hang($id){
    $sql = "SELECT ct.* FROM giohang gh JOIN chitietgiohang ct ON gh.id_gio_hang = ct.id_gio_hang WHERE gh.id_nguoi_dung = ?;";
    return pdo_query($sql,$id);
}
function update_so_luong($so_luong, $id_bien_the, $id_gio_hang) {
    $sql = "UPDATE `chitietgiohang` SET so_luong = so_luong + ? WHERE id_bien_the = ? AND id_gio_hang = ?";
    return pdo_execute($sql, $so_luong, $id_bien_the, $id_gio_hang);
}
function create_new_cart($id){
    $sql = "INSERT INTO `giohang`( `id_nguoi_dung`) VALUES (?)";
    return pdo_execute($sql,$id);
}
function delete_cart($id){
    $sql = "DELETE FROM `chitietgiohang` WHERE id = ?";
    return pdo_execute($sql,$id);
}
function check_user_cart($id){
    $sql = "SELECT * FROM giohang WHERE id_nguoi_dung = ?";
    return pdo_query_one($sql,$id);
}
function update_cart_user($so_luong,$id_nd,$id_sp){
    $sql = "UPDATE `chitietgiohang` SET `so_luong`= $so_luong WHERE id_gio_hang = (SELECT id_gio_hang FROM giohang WHERE id_nguoi_dung =  $id_nd ) AND id_bien_the =  $id_sp ";
    return pdo_execute($sql);
}
function clear_cart($id){
    $sql = "DELETE FROM `chitietgiohang` WHERE id_gio_hang = (SELECT id_gio_hang FROM giohang WHERE id_nguoi_dung = ?)";
    return pdo_execute($sql,$id);
}