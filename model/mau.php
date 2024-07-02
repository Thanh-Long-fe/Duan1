<?php

function get_color(){
    $sql = "SELECT * FROM mau";
    return pdo_query($sql);

}
function loadallmau()
{
    $sql = "SELECT * FROM mau order by id_mau ";
    $listmau = pdo_query($sql);
    return $listmau;
}
function insert_mau($ten_mau)
{
    $sql = "INSERT INTO mau(ten_mau) values('$ten_mau')";
    pdo_execute($sql);
}
function sua_mau($id_mau)
{
    $sql = "SELECT * FROM mau WHERE id_mau=" . $id_mau;
    $suamau = pdo_query_one($sql);
    return $suamau;
}
function update_mau($id_mau, $ten_mau)
{
    $sql = "UPDATE mau SET ten_mau='" . $ten_mau . "' WHERE id_mau=" . $id_mau;
    pdo_execute($sql);
}
function delete_mau($id_mau)
{
    // Kiểm tra xem có bất kỳ phụ thuộc nào trong bảng 'bienthe' không
    $sql_check = "SELECT * FROM bienthe WHERE id_mau = ?";
    $result_check = pdo_query($sql_check, $id_mau);
    if (!empty($result_check)) {
        return false; // Có phụ thuộc, nên không thể xóa
    }

    // Nếu không có phụ thuộc nào được tìm thấy, tiến hành xóa
    $sql = "DELETE FROM `mau` WHERE id_mau = ?";
    pdo_execute($sql, $id_mau);
    return true; // Xóa thành công
}
