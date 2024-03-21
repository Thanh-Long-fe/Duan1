<?php
function add_sp($ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong){
    $sql = "INSERT INTO `sanpham`(`ten_san_pham`, `hinh_anh`, `mota`, `gia`, `id_danh_muc`, `id_thuong_hieu`, `status`, `so_luong`)
    VALUES (?,?,?,?,?,?,?,?)";
    return pdo_execute($sql,$ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong);
}

function get_all_sp(){
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);

}
function get_one_sp($id){
    $sql = "SELECT * FROM sanpham WHERE id=$id";
    return pdo_query_one($sql);
    
}
function get_all(){
    $sql = "SELECT *
    FROM sanpham
    JOIN danhmuc ON sanpham.id_danh_muc = danhmuc.id_danh_muc
    JOIN thuong_hieu ON sanpham.id_thuong_hieu = thuong_hieu.id_thuong_hieu
    ";
    return pdo_query($sql);
}

function update_all($ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong,$id){
    $sql = "UPDATE `sanpham`
    SET `ten_san_pham`=?,`hinh_anh`=?,`mota`=?,`gia`=?,`id_danh_muc`=?,`id_thuong_hieu`=?,`status`=?,`so_luong`=?
    WHERE id=$id";
    return pdo_execute($sql,$ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong);
}

function update_one($ten_san_pham, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong,$id){
    $sql = "UPDATE `sanpham`
    SET `ten_san_pham`=?,`mota`=?,`gia`=?,`id_danh_muc`=?,`id_thuong_hieu`=?,`status`=?,`so_luong`=?
    WHERE id=$id";
    return pdo_execute($sql,$ten_san_pham, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong);
}
function delete_mem($id_san_pham){
    $sql_check_hoa_don = "SELECT *
    FROM chi_tiet_hoa_don cthd 
    JOIN bienthe bt ON cthd.id_bien_the = bt.id_bien_the
    JOIN hoadon hd ON cthd.id_hoa_don = hd.id_hoa_don 
    WHERE bt.id_san_pham = ?
    AND hd.trang_thai = 'Đang xử lý'
     ";

$list_hoa_don_dang_giao = pdo_query($sql_check_hoa_don, $id_san_pham);
    
if (!empty($list_hoa_don_dang_giao)) {
    // Nếu có hóa đơn đang giao chứa sản phẩm này, không thực hiện ẩn sản phẩm
    return false;
}

// Bước 2: Ẩn sản phẩm bằng cách cập nhật trường status
$sql_hide_sanpham = "UPDATE sanpham SET `status` = 1 WHERE id = ?";
pdo_execute($sql_hide_sanpham, $id_san_pham);

// Trả về true để thông báo rằng sản phẩm đã được ẩn thành công
return true;
} 

function view_sp($id_san_pham){



$sql_hide_sanpham = "UPDATE sanpham SET `status` = 0 WHERE id = ?";
  return pdo_execute($sql_hide_sanpham, $id_san_pham);



} 






?>

