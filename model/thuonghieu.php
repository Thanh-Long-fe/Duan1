<?php

function get_all_thuonghieu(){
    $sql = "SELECT * FROM thuong_hieu";
    return pdo_query($sql);
}