<?php
function loadallbinhluan()
{
    $sql = "SELECT bl.*, sp.ten_san_pham, nd.ho_ten FROM binhluan bl JOIN nguoidung nd ON bl.id_nguoi_dung = nd.id_nguoi_dung JOIN sanpham sp ON bl.id_san_pham = sp.id  order by id_binh_luan ";
    $listbl = pdo_query($sql);
    return $listbl;
}
function deletebinhluan($id_binh_luan){
    $sql = "DELETE FROM binhluan WHERE id_binh_luan = $id_binh_luan";
    pdo_execute($sql);
    return "Xóa Thành công";
   
}

function get_all_bl($id){
    $sql = "SELECT bl.*, nd.ho_ten as 'ten_nguoi_dung' FROM binhluan bl JOIN nguoidung nd ON bl.id_nguoi_dung = nd.id_nguoi_dung JOIN sanpham sp ON bl.id_san_pham = sp.id WHERE sp.id = ?";
    return pdo_query($sql,$id);

}
function them_binh_luan($tieu_de, $noi_dung, $ngay_dang, $id_san_pham, $id_nguoi_dung, $rating){
    $sql = "INSERT INTO `binhluan`( `tieu_de`, `noi_dung`, `ngay_dang`, `id_san_pham`, `id_nguoi_dung`, `rating`) VALUES (?,?,?,?,?,?)";
    return pdo_execute($sql,$tieu_de, $noi_dung, $ngay_dang, $id_san_pham, $id_nguoi_dung, $rating);
}
function unique_rating($id_nd,$id_sp){
    $sql = "SELECT bl.rating FROM binhluan bl JOIN sanpham sp ON bl.id_san_pham = sp.id JOIN nguoidung nd ON nd.id_nguoi_dung = bl.id_nguoi_dung WHERE nd.id_nguoi_dung = ? AND sp.id = ?";
    return pdo_query($sql,$id_nd,$id_sp);
}
function avg_rating($id){
    $sql = "SELECT id_san_pham, AVG(rating) AS 'avg_rating'
    FROM binhluan
    WHERE rating >= 1 AND id_san_pham = ?";
    return pdo_query_one($sql,$id);
}
function dem_bl($id_sp){
    $sql = "SELECT COUNT(*) as 'sl' FROM `binhluan` WHERE id_san_pham = ?";
    return pdo_query_one($sql,$id_sp);
}
function bao_cao($id)
{
$sql = "UPDATE `binhluan` SET `status`= 1 WHERE id_binh_luan = ?";
return pdo_execute($sql,$id);
}

function get_bl_rp(){
    $sql = "SELECT binhluan.*,sanpham.ten_san_pham,nguoidung.id_nguoi_dung,nguoidung.ho_ten FROM `binhluan` JOIN sanpham ON binhluan.id_san_pham = sanpham.id JOIN nguoidung ON nguoidung.id_nguoi_dung = binhluan.id_nguoi_dung WHERE  binhluan.status = 1 ";
    return pdo_query($sql);
}
   

function bo_qua($id){
    $sql = "UPDATE `binhluan` SET `status`= 0 WHERE id_binh_luan = ?";
    return pdo_execute($sql,$id);
}
function edit_cmt($nd,$id){

    $sql = "UPDATE `binhluan` SET `noi_dung`= ? WHERE  id_binh_luan = ?";
    return pdo_execute($sql,$nd,$id);
}