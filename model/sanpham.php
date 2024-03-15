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
function delete_mem(){
    $sql = "SELECT ";
}

function delete_sp($id_san_pham) {
    // Bước 1: Xóa các bình luận liên quan đến sản phẩm
    $sql_delete_binhluan = "DELETE FROM binhluan WHERE id_san_pham = ?";
    pdo_execute($sql_delete_binhluan, $id_san_pham);

    // Bước 2: Xóa các giỏ hàng chứa biến thể của sản phẩm
    $sql_delete_cart = "DELETE FROM giohang WHERE id_bien_the IN (SELECT id_bien_the FROM bienthe WHERE id_san_pham = ?)";
    pdo_execute($sql_delete_cart, $id_san_pham);

    // Bước 3: Xóa các chi tiết hóa đơn liên quan đến biến thể của sản phẩm
    $sql_delete_cthd = "DELETE FROM chi_tiet_hoa_don WHERE id_bien_the IN (SELECT id_bien_the FROM bienthe WHERE id_san_pham = ?)";
    pdo_execute($sql_delete_cthd, $id_san_pham);

    // Bước 4: Xóa các hóa đơn liên quan đến sản phẩm
    $sql_select_hd = "SELECT DISTINCT id_hoa_don FROM chi_tiet_hoa_don WHERE id_bien_the IN (SELECT id_bien_the FROM bienthe WHERE id_san_pham = ?)";
    $list_hd = pdo_query($sql_select_hd, $id_san_pham);
    foreach ($list_hd as $hd) {
        $id_hoa_don = $hd['id_hoa_don'];
        $sql_delete_hd = "DELETE FROM hoadon WHERE id_hoa_don = ?";
        pdo_execute($sql_delete_hd, $id_hoa_don);
    }

    // Bước 5: Xóa các biến thể liên quan đến sản phẩm
    $sql_delete_bienthe = "DELETE FROM bienthe WHERE id_san_pham = ?";
    pdo_execute($sql_delete_bienthe, $id_san_pham);

    // Bước 6: Xóa sản phẩm từ bảng sản phẩm
    $sql_delete_sanpham = "DELETE FROM sanpham WHERE id = ?";
    pdo_execute($sql_delete_sanpham, $id_san_pham);
}




?>
