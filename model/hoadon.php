<?php 

function get_hoa_don(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan";
    return pdo_query($sql);

}

function get_hoa_don_view($id){
    $sql = "SELECT hd.*, nd.ho_ten AS hoten_acc, tt.ten_thanh_toan 
    FROM hoadon hd 
    JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung 
    JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan 
    WHERE nd.id_nguoi_dung = ? 
    ORDER BY hd.ngay_dat DESC";
    return pdo_query($sql,$id);

}

function check_buy_product($id_user,$id_sp){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan,sp.id FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan JOIN chi_tiet_hoa_don ct ON ct.id_hoa_don = hd.id_hoa_don JOIN bienthe bt ON ct.id_bien_the = bt.id_bien_the JOIN sanpham sp ON sp.id = bt.id_san_pham WHERE nd.id_nguoi_dung =? AND sp.id=? AND trang_thai = 'Đã giao'";
    return pdo_query($sql,$id_user,$id_sp);

    
}

function get_ct($id){
    $sql ="SELECT ct.*, m.ten_mau,sz.ten_size,sp.ten_san_pham,bt.gia FROM chi_tiet_hoa_don ct JOIN bienthe bt ON ct.id_bien_the = bt.id_bien_the JOIN sanpham sp ON bt.id_san_pham = sp.id JOIN size sz ON bt.id_size = sz.id_size JOIN mau m ON bt.id_mau = m.id_mau WHERE ct.id_hoa_don = ?";
    return pdo_query($sql,$id);
}

function update_giao_hang($trang_thai,$id){
    $sql = "UPDATE `hoadon` SET`trang_thai`= ? WHERE id_hoa_don = ?";
    return pdo_execute($sql,$trang_thai,$id);
}
function tong_tien(){
    $sql = "SELECT SUM(tong_tien) AS tong_tien_thanh_cong
    FROM hoadon
    WHERE trang_thai = 'Đã giao';
    ";
    return pdo_query_one($sql);

}
function tong_don_thanh_cong(){
    $sql = "SELECT COUNT(*) AS tong_so_don_thanh_cong
    FROM hoadon
    WHERE trang_thai = 'Đã giao';
    
    ";
    return pdo_query_one($sql);

}


function tong_don_bi_huy(){
    $sql = "SELECT COUNT(*) AS tong_so_don_huy
    FROM hoadon
    WHERE trang_thai = 'Hủy đơn';
    
    ";
    return pdo_query_one($sql);

}

function tong_don(){
    $sql = "SELECT COUNT(*) AS a
    FROM hoadon";
    return pdo_query_one($sql);

}

function tien_theo_thang(){
    $sql = "SELECT MONTH(ngay_dat) AS thang, SUM(tong_tien) AS tong_tien_thang
    FROM hoadon
    WHERE trang_thai = 'Đã giao'
    GROUP BY MONTH(ngay_dat)";
    return pdo_query($sql);
}

function don_dang_theo_ngay(){
    $sql = "SELECT DATE(ngay_dat) AS ngay, COUNT(*) AS so_luong_don_hang
    FROM hoadon
    GROUP BY DATE(ngay_dat)
    ORDER BY DATE(ngay_dat) DESC;";

    return pdo_query($sql);
}


function don_dang_theo_thang(){
    $sql = "SELECT MONTH(ngay_dat) AS thang, COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE YEAR(ngay_dat) = YEAR(CURDATE())
    GROUP BY MONTH(ngay_dat)
    ORDER BY MONTH(ngay_dat) DESC;";

    return pdo_query($sql);
}



function get_hoa_don_by_date($date){
    $sql = "SELECT hd.*, nd.ho_ten, tt.ten_thanh_toan 
    FROM hoadon hd 
    JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung 
    JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan 
    WHERE DATE(hd.ngay_dat) = ?;
    ";

    return pdo_query($sql,$date);

}


function get_hoa_don_by_thang($month){
    $sql = "SELECT hd.*, nd.ho_ten, tt.ten_thanh_toan 
    FROM hoadon hd 
    JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung 
    JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan 
    WHERE YEAR(ngay_dat) = YEAR(CURDATE()) AND  MONTH(hd.ngay_dat) = ?;
    ";

    return pdo_query($sql,$month);

}

function get_dang_van_chuyen(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan
    WHERE hd.trang_thai = 'Đang vận chuyển'";
 
 return pdo_query($sql);
}
function dang_van_chuyen(){
    $sql = "SELECT  COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE trang_thai = 'Đang vận chuyển'";
 
 return pdo_query_one($sql);
}



function get_dang_cho(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan
    WHERE hd.trang_thai = 'Đang chờ'";
    return pdo_query($sql);
}
function dang_cho(){
    $sql = "SELECT  COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE trang_thai = 'Đang chờ'";
    return pdo_query_one($sql);
}

function get_dang_xu_ly(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan
    WHERE hd.trang_thai = 'Đang xử lý'";
    return pdo_query($sql);
}
function dang_xu_ly(){
    $sql = "SELECT  COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE trang_thai = 'Đang xử lý'";
    return pdo_query_one($sql);
}
function get_da_huy(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan
    WHERE hd.trang_thai = 'Hủy đơn'";
    return pdo_query($sql);
}
function da_huy(){
    $sql = "SELECT  COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE trang_thai = 'Hủy đơn'";
    return pdo_query_one($sql);
}

function get_da_giao(){
    $sql = "SELECT hd.*,nd.ho_ten,tt.ten_thanh_toan FROM hoadon hd JOIN nguoidung nd ON hd.id_nguoi_dung = nd.id_nguoi_dung JOIN thanh_toan tt ON hd.id_thanh_toan = tt.id_thanh_toan
    WHERE hd.trang_thai = 'Đã giao'";
    return pdo_query($sql);
}

function da_giao(){
    $sql = "SELECT  COUNT(*) AS so_luong_hoa_don
    FROM hoadon
    WHERE trang_thai = 'Đã giao'";
    return pdo_query_one($sql);
}
function xac_nhan($id){
    $sql = "UPDATE hoadon SET trang_thai = 'Đang xử lý' WHERE id_hoa_don = ?";
    return pdo_execute($sql,$id);



}

function tu_choi($id){
    $sql = "UPDATE hoadon SET trang_thai = 'Hủy đơn' WHERE id_hoa_don = ?";
    return pdo_execute($sql,$id);
    
}
function da_nhan($id){
    $sql = "UPDATE hoadon SET trang_thai = 'Đã giao' WHERE id_hoa_don = ?";
    return pdo_execute($sql,$id);
    
}

function add_dh($id_hoa_don, $id_nguoi_dung,$ho_ten, $ngay_dat, $dia_chi, $sdt, $ghi_chu, $id_thanh_toan, $trang_thai, $tong_tien){
    if (!empty($ghi_chu)) {
        $sql = "INSERT INTO `hoadon` (`id_hoa_don`, `id_nguoi_dung`, `ho_ten`, `ngay_dat`, `dia_chi`, `sdt`, `ghi_chu`, `id_thanh_toan`, `trang_thai`, `tong_tien`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
         pdo_execute($sql, $id_hoa_don, $id_nguoi_dung, $ho_ten, $ngay_dat, $dia_chi, $sdt, $ghi_chu, $id_thanh_toan, $trang_thai, $tong_tien);
    } else {
        $sql = "INSERT INTO `hoadon` (`id_hoa_don`, `id_nguoi_dung`, `ho_ten`, `ngay_dat`, `dia_chi`, `sdt`, `id_thanh_toan`, `trang_thai`, `tong_tien`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
         pdo_execute($sql, $id_hoa_don, $id_nguoi_dung, $ho_ten, $ngay_dat, $dia_chi, $sdt, $id_thanh_toan, $trang_thai, $tong_tien);
    }
}
function add_ct($id_hoa_don, $id_bien_the, $soluong,$gia_khi_mua){
    $sql = "INSERT INTO `chi_tiet_hoa_don`(`id_hoa_don`, `id_bien_the`, `soluong`,`gia_khi_mua`)
    VALUES (?,?,?,?)";
    return pdo_execute($sql,$id_hoa_don, $id_bien_the, $soluong,$gia_khi_mua);
}


