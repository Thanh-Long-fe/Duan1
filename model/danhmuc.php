<?php


function loadall_danhmuc(){
    $sql = "SELECT * FROM danhmuc WHERE trangthai = 0";
    return pdo_query($sql);
}

function get_all_dm(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}
function get_dm_hide(){
    $sql = "SELECT * FROM danhmuc WHERE trangthai = 1";
    return pdo_query($sql);
}
function loadalldanhmuc()
{
    $sql = "SELECT * FROM danhmuc order by id_danh_muc ";
    $listdm = pdo_query($sql);
    return $listdm;
}
// function load_ten_danhmuc($id_danh_muc) {
//     $sql = "SELECT * FROM danhmuc WHERE id=?";
//     $result = pdo_query_one($sql,$iddm);
//     extract($result);
//     return $tendanhmuc;
// }

function insert_danhmuc($tendanhmuc)
    {
        $sql = "INSERT INTO danhmuc(ten_danh_muc) values('$tendanhmuc')";
        pdo_execute($sql);
    }
function deletedanhmuc($id_danh_muc)
{
    $sql = "DELETE FROM danhmuc WHERE id_danh_muc = ".$id_danh_muc;
    pdo_execute($sql);
    return "Xóa Thành công";
   
}
function suadm($tendanhmuc)
{
    $sql = "SELECT * FROM danhmuc WHERE ten_danh__muc=" . $tendanhmuc;
    $tendanhmuc = pdo_query_one($sql);
    return $tendanhmuc;
}
function update_danhmuc($tendanhmuc,$iddanhmuc)
{
    $sql = "UPDATE `danhmuc` SET ten_danh_muc = '$tendanhmuc' WHERE id_danh_muc = $iddanhmuc";
    pdo_execute($sql);
}

function load_dm_byId($iddanhmuc)
{
    $sql = "SELECT * FROM danhmuc WHERE id_danh_muc = ?";
    $result = pdo_query_one($sql , $iddanhmuc);
    return $result;
}
function an_dm($id_dm){
    if ($id_dm == 21) {
       return false;
    }
    else{
        $sql_dm = "UPDATE danhmuc SET `trangthai` = 1 WHERE id_danh_muc = $id_dm";
    pdo_execute($sql_dm);

    $sql = "UPDATE sanpham SET id_danh_muc = 21 WHERE id_danh_muc = $id_dm";
   pdo_execute($sql);
   return true;
    }
    
}

function set_dm_hide($id){
    $sql = "UPDATE danhmuc SET `trangthai` = 0 WHERE id_danh_muc = $id";
    return pdo_query($sql);
}
?>


