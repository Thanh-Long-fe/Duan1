<?php

function get_color(){
    $sql = "SELECT * FROM mau";
    return pdo_query($sql);

}