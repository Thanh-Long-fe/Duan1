<?php 

function get_fb(){
    $sql = "SELECT * FROM feedback ORDER BY ngay DESC";
    return pdo_query($sql);
}
function send_fb($ho_ten, $email, $noi_dung, $ngay, $tieu_de){
    $sql = "INSERT INTO `feedback`( `ten`, `email`, `noi_dung`, `ngay`, `tieu_de`)
    VALUES (?,?,?,?,?)";
    return pdo_execute($sql,$ho_ten, $email, $noi_dung, $ngay, $tieu_de);
}