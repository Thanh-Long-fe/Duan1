<?php
function get_bt_from_san_pham($id_sp){
    $sql = "SELECT sanpham.ten_san_pham,mau.ten_mau,size.ten_size,bienthe.so_luong,bienthe.hinh_anh,bienthe.id_bien_the
    FROM bienthe
    INNER JOIN sanpham ON bienthe.id_san_pham = sanpham.id INNER JOIN size ON bienthe.id_size = size.id_size INNER JOIN mau ON bienthe.id_mau = mau.id_mau WHERE bienthe.id_san_pham = $id_sp;";
    return pdo_query($sql);
}

?>