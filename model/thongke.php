<?php
function loadall_thongke()
{
    $sql = "SELECT l.id_thuong_hieu as idthuonghieu, l.ten_thuong_hieu as tenthuonghieu, 
    count(*) as countsp, 
    min(s.gia) as mingia,
    max(s.gia) as maxgia, 
    avg(s.gia) as giatb 
    FROM sanpham s JOIN thuong_hieu l 
    ON l.id_thuong_hieu = s.id_thuong_hieu 
    group by l.id_thuong_hieu, s.id_thuong_hieu";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
