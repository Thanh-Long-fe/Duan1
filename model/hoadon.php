<?php 

function get_hoa_don(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan";
    return pdo_query($sql);

}

function get_ct($id){
    $sql ="SELECT ct.*, m.ten_mau,sz.ten_size,sp.ten_san_pham,bt.gia FROM chi_tiet_hoa_don ct JOIN bienthe bt ON ct.id_bien_the = bt.id_bien_the JOIN sanpham sp ON bt.id_san_pham = sp.id JOIN size sz ON bt.id_size = sz.id_size JOIN mau m ON bt.id_mau = m.id_mau WHERE ct.id_hoa_don = ?";
    return pdo_query($sql,$id);
}

function update_giao_hang($trang_thai,$id){
    $sql = "UPDATE `hoadon` SET`trang_thai`= ? WHERE id_hoa_don = $id";
    return pdo_execute($sql,$trang_thai);
}