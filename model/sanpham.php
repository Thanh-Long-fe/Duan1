<?php
function add_sp($ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong,$sale)
{
    $sql = "INSERT INTO `sanpham`(`ten_san_pham`, `hinh_anh`, `mota`, `gia`, `id_danh_muc`, `id_thuong_hieu`, `status`, `so_luong`,`sale`)
    VALUES (?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql, $ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $status, $so_luong,$sale);
}

function get_all_sp()
{
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}
function get_one_sp($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=$id";
    return pdo_query_one($sql);
}
function get_all()
{
    $sql = "SELECT sp.*, dm.ten_danh_muc, th.ten_thuong_hieu
    FROM sanpham sp
    JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
    JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
    ";
    return pdo_query($sql);
}
function get_all_sp_view()
{
    $sql = "SELECT sp.*,
    dm.id_danh_muc, 
    dm.ten_danh_muc,
    th.id_thuong_hieu,
    th.ten_thuong_hieu
   
   
FROM 
    sanpham sp
JOIN 
    danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
JOIN 
    thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu

    ";
    return pdo_query($sql);
}
function dem_dm(){
    $sql = "SELECT dm.id_danh_muc, dm.ten_danh_muc, COUNT(sp.id) AS so_luong_san_pham
    FROM sanpham sp
    JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
    WHERE sp.status = 0
    GROUP BY dm.id_danh_muc, dm.ten_danh_muc;
    ";
    return pdo_query($sql);
}
function dem_th(){
    $sql = "SELECT th.id_thuong_hieu, th.ten_thuong_hieu, COUNT(sp.id) AS so_luong_san_pham
    FROM sanpham sp
    JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
    WHERE sp.status = 0
    GROUP BY th.id_thuong_hieu, th.ten_thuong_hieu;
    ";
    return pdo_query($sql);
}
function update_all($ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $so_luong, $sale, $id)
{
    $sql = "UPDATE `sanpham`
    SET `ten_san_pham`=?,`hinh_anh`=?,`mota`=?,`gia`=?,`id_danh_muc`=?,`id_thuong_hieu`=?,`so_luong`=?,`sale` = ?
    WHERE id=$id";
    return pdo_execute($sql, $ten_san_pham, $hinh_anh, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $so_luong,$sale);
}

function update_one($ten_san_pham, $mota, $gia, $id_danh_muc, $id_thuong_hieu,  $so_luong,$sale, $id)
{
    $sql = "UPDATE `sanpham`
    SET `ten_san_pham`=?,`mota`=?,`gia`=?,`id_danh_muc`=?,`id_thuong_hieu`=?,`so_luong`=?, `sale` = ?
    WHERE id=$id";
    return pdo_execute($sql, $ten_san_pham, $mota, $gia, $id_danh_muc, $id_thuong_hieu, $so_luong,$sale);
}
function delete_mem($id_san_pham)
{
    $sql_check_hoa_don = "SELECT *
    FROM chi_tiet_hoa_don cthd 
    JOIN bienthe bt ON cthd.id_bien_the = bt.id_bien_the
    JOIN hoadon hd ON cthd.id_hoa_don = hd.id_hoa_don 
    WHERE bt.id_san_pham = ?
    AND hd.trang_thai = 'Đang xử lý' OR hd.trang_thai = 'Đang chờ' OR hd.trang_thai = 'Đang vận chuyển'
     ";

    $list_hoa_don_dang_giao = pdo_query($sql_check_hoa_don, $id_san_pham);
    $check = true;
    if (!empty($list_hoa_don_dang_giao)) {
        // Nếu có hóa đơn đang giao chứa sản phẩm này, không thực hiện ẩn sản phẩm
        $check = false;
    }

    // Bước 2: Ẩn sản phẩm bằng cách cập nhật trường status
    $sql_hide_sanpham = "UPDATE sanpham SET `status` = 1 WHERE id = ?";
    pdo_execute($sql_hide_sanpham, $id_san_pham);

    // Trả về true để thông báo rằng sản phẩm đã được ẩn thành công
    return $check;
}

function view_sp($id_san_pham)
{



    $sql_hide_sanpham = "UPDATE sanpham SET `status` = 0 WHERE id = ?";
    return pdo_execute($sql_hide_sanpham, $id_san_pham);
}


function list_hide_sp()
{
    $sql = "SELECT sp.*, dm.ten_danh_muc, th.ten_thuong_hieu
    FROM sanpham sp
    JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
    JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
     WHERE sp.status = 1";
    return pdo_query($sql);
}
function tong_sp()
{
    $sql = "SELECT COUNT(*) AS total_products FROM sanpham WHERE `status` = 0;
    ";
    return pdo_query_one($sql);
}
function top8()
{
    $sql = "SELECT sanpham.*, danhmuc.ten_danh_muc, thuong_hieu.ten_thuong_hieu
    FROM sanpham JOIN danhmuc ON sanpham.id_danh_muc = danhmuc.id_danh_muc
    JOIN thuong_hieu ON sanpham.id_thuong_hieu = thuong_hieu.id_thuong_hieu
    WHERE sanpham.status = 0
    ORDER BY so_luot_xem DESC
    LIMIT 8;";
    return pdo_query($sql);
}
function top10_sale()
{
    $sql = "SELECT sanpham.*, danhmuc.ten_danh_muc, thuong_hieu.ten_thuong_hieu
    FROM sanpham JOIN danhmuc ON sanpham.id_danh_muc = danhmuc.id_danh_muc
    JOIN thuong_hieu ON sanpham.id_thuong_hieu = thuong_hieu.id_thuong_hieu
    WHERE sanpham.status = 0
    ORDER BY sanpham.sale DESC
    LIMIT 10;";
    return pdo_query($sql);
}
function san_pham_cung_loai($id)
{
    $sql = "SELECT sanpham.*, danhmuc.ten_danh_muc, thuong_hieu.ten_thuong_hieu
    FROM sanpham JOIN danhmuc ON sanpham.id_danh_muc = danhmuc.id_danh_muc
    JOIN thuong_hieu ON sanpham.id_thuong_hieu = thuong_hieu.id_thuong_hieu
    WHERE sanpham.status = 0 AND sanpham.id_danh_muc = ? ;";
    return pdo_query($sql,$id);
}
function get_sp_cuoi()
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 1;";
    return pdo_query_one($sql);
}

function tang_so_luot_xem($id)
{
    $sql = "UPDATE sanpham SET so_luot_xem = so_luot_xem + 1 WHERE id = $id";
    return pdo_execute($sql);
}

function sanpham_get_by_key($key){
    $sql = "SELECT * ,COUNT(sp.id) AS so_luong_san_pham FROM sanpham sp
        JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
        WHERE sp.ten_san_pham like ? OR dm.ten_danh_muc like ? OR th.ten_thuong_hieu like ?
        GROUP BY dm.id_danh_muc, dm.ten_danh_muc ,th.id_thuong_hieu, th.ten_thuong_hieu"; 
    return pdo_query($sql, '%' . $key . '%', '%' . $key . '%','%' . $key . '%');
}


function get_sp_bt_th($id)
{
    $sql = "SELECT sp.*, dm.ten_danh_muc, th.ten_thuong_hieu, COUNT(*) as 'so_luong_san_pham'
    FROM sanpham sp
    JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
    JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
    WHERE th.id_thuong_hieu = ? HAVING so_luong_san_pham > 0
    ";
    return pdo_query($sql,$id);
}
function get_sp_bt_dm($id)
{
    $sql = "SELECT sp.*, dm.ten_danh_muc, th.ten_thuong_hieu,COUNT(*) as 'so_luong_san_pham'
    FROM sanpham sp
    JOIN danhmuc dm ON sp.id_danh_muc = dm.id_danh_muc
    JOIN thuong_hieu th ON sp.id_thuong_hieu = th.id_thuong_hieu
    WHERE dm.id_danh_muc = ? AND sp.status = 0 HAVING so_luong_san_pham > 0
    ";
    return pdo_query($sql,$id);
}
function get_bt_by_sp($id){
    $sql = "SELECT bienthe.id_bien_the FROM bienthe JOIN sanpham ON bienthe.id_san_pham = sanpham.id WHERE bienthe.id_mau = 1 AND bienthe.id_size = 1 AND sanpham.id = ?";
    return pdo_query_one($sql,$id);
}
function get_id_dm_by_sp ($id){
$sql = "SELECT danhmuc.id_danh_muc FROM sanpham JOIN danhmuc ON danhmuc.id_danh_muc = sanpham.id_danh_muc WHERE sanpham.id = ?";
return pdo_query_one($sql,$id);
}