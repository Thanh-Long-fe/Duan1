<?php 

function get_size(){
    $sql = "SELECT * FROM `size`";
    return pdo_query($sql);
}

