<?php 
function get_pay(){
    $sql ="SELECT * FROM thanh_toan WHERE  `status` = 0";
return pdo_query($sql);
}
function loadallpttt()
{
    $sql = "SELECT * FROM thanh_toan order by id_thanh_toan ";
    $listpttt = pdo_query($sql);
    return $listpttt;
}
function insert_pttt($ten_thanh_toan)
{
    $sql = "INSERT INTO thanh_toan(ten_thanh_toan) values('$ten_thanh_toan')";
    pdo_execute($sql);
}
function sua_pttt($id_thanh_toan)
{
    $sql = "SELECT * FROM thanh_toan WHERE id_thanh_toan=" . $id_thanh_toan;
    $suapttt = pdo_query_one($sql);
    return $suapttt;
}
function update_pttt($id_thanh_toan, $ten_thanh_toan)
{
    $sql = "UPDATE thanh_toan SET ten_thanh_toan='" . $ten_thanh_toan . "' WHERE id_thanh_toan=" . $id_thanh_toan;
    pdo_execute($sql);
}
function an_tt($id){
$sql = "UPDATE `thanh_toan` SET `status`= 1 WHERE id_thanh_toan = ?";
return pdo_execute($sql,$id);
}
function hien_tt($id){
    $sql = "UPDATE `thanh_toan` SET `status`= 0 WHERE id_thanh_toan = ?";
    return pdo_execute($sql,$id);
    }
?>
