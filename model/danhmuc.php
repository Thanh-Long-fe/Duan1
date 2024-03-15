<?php

function get_all_dm(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}