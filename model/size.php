<?php 

function get_size(){
    $sql = "SELECT * FROM `size`";
    return pdo_query($sql);
}

function loadallsize()
{
    $sql = "SELECT * FROM size order by id_size ";
    $listsize = pdo_query($sql);
    return $listsize;
}
// function insert_mau($ten_size)
// {
//     $sql = "INSERT INTO mau(ten_size) values('$ten_size')";
//     pdo_execute($sql);
// }
function sua_size($id_size)
{
    $sql = "SELECT * FROM size WHERE id_size=" . $id_size;
    $suasize = pdo_query_one($sql);
    return $suasize;
}
function update_size($id_size, $ten_size)
{
    $sql = "UPDATE size SET ten_size='" . $ten_size . "' WHERE id_size=" . $id_size;
    pdo_execute($sql);
}
function delete_size($id_size)
{
    // Kiểm tra xem có bất kỳ phụ thuộc nào trong bảng 'bienthe' không
    $sql_check = "SELECT * FROM bienthe WHERE id_size = ?";
    $result_check = pdo_query($sql_check, $id_size);
    if (!empty($result_check)) {
        return false; // Có phụ thuộc, nên không thể xóa
    }

    // Nếu không có phụ thuộc nào được tìm thấy, tiến hành xóa
    $sql = "DELETE FROM `size` WHERE id_size = ?";
    pdo_execute($sql, $id_size);
    return true; // Xóa thành công
}



function add_size($size)
{
    $sql = "INSERT INTO `size`(`ten_size`) VALUES (?)";
    pdo_query($sql,$size);
}