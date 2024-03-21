<?php
function get_bt_from_san_pham($id_sp){
    $sql = "SELECT sanpham.ten_san_pham,mau.ten_mau,size.ten_size,bienthe.so_luong,bienthe.hinh_anh,bienthe.gia,bienthe.id_bien_the,bienthe.status
    FROM bienthe
    INNER JOIN sanpham ON bienthe.id_san_pham = sanpham.id INNER JOIN size ON bienthe.id_size = size.id_size INNER JOIN mau ON bienthe.id_mau = mau.id_mau WHERE bienthe.id_san_pham = $id_sp;";
    return pdo_query($sql);
}


function add_bien_the($id_san_pham, $id_size, $id_mau, $gia, $hinh_anh, $so_luong, $status){
$sql = "INSERT INTO `bienthe`(`id_san_pham`, `id_size`, `id_mau`, `gia`, `hinh_anh`, `so_luong`, `status`)
VALUES (?,?,?,?,?,?,?)";
return pdo_execute($sql,$id_san_pham, $id_size, $id_mau, $gia, $hinh_anh, $so_luong, $status);
}

function get_bien_the_one($id_bien_the){
$sql = "SELECT * FROM bienthe WHERE id_bien_the = $id_bien_the";
return pdo_query_one($sql);
}


function edit_bt_all($id_san_pham,$id_size,$id_mau,$gia,$hinh_anh,$so_luong,$status,$id_bien_the){
$sql = "UPDATE `bienthe`
SET `id_san_pham`=?,`id_size`=?,`id_mau`=?,`gia`=?,`hinh_anh`=?,`so_luong`=?,`status`=?
WHERE id_bien_the = $id_bien_the";
return pdo_execute($sql,$id_san_pham,$id_size,$id_mau,$gia,$hinh_anh,$so_luong,$status);
}

function edit_bt_one($id_san_pham,$id_size,$id_mau,$gia,$so_luong,$status,$id_bien_the){
    $sql = "UPDATE `bienthe`
    SET `id_san_pham`=?,`id_size`=?,`id_mau`=?,`gia`=?,`so_luong`=?,`status`=?
    WHERE id_bien_the = $id_bien_the";
    return pdo_execute($sql,$id_san_pham,$id_size,$id_mau,$gia,$so_luong,$status);
    }



    function delete_bt_sp($id_bien_the){
        $sql_check_hoa_don = "SELECT *
        FROM chi_tiet_hoa_don cthd 
        JOIN bienthe bt ON cthd.id_bien_the = bt.id_bien_the
        JOIN hoadon hd ON cthd.id_hoa_don = hd.id_hoa_don 
        WHERE bt.id_bien_the = ?
        AND hd.trang_thai = 'Đang xử lý'
         
         ";
    
    $list_hoa_don_dang_giao = pdo_query($sql_check_hoa_don, $id_bien_the);
        
    if (!empty($list_hoa_don_dang_giao)) {
        // Nếu có hóa đơn đang giao chứa sản phẩm này, không thực hiện ẩn sản phẩm
        return false;
    }
    
    // Bước 2: Ẩn sản phẩm bằng cách cập nhật trường status
    $hide_bt = "UPDATE bienthe SET `status` = 1 WHERE id_bien_the = ?";
    pdo_execute($hide_bt, $id_bien_the);
    
    // Trả về true để thông báo rằng sản phẩm đã được ẩn thành công
    return true;
    }
?>