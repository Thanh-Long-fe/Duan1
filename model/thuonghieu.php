<?php
 function loadall_thuonghieu(){
    $sql = "SELECT * FROM thuong_hieu WHERE `status` = 0";
    return pdo_query($sql);
 }

function get_all_thuonghieu(){
    $sql = "SELECT * FROM thuong_hieu WHERE status = 0";
    return pdo_query($sql);
}
function get_one_thuonghieu($id){
    $sql = "SELECT * FROM thuong_hieu WHERE id_thuong_hieu = $id";
    return pdo_query_one($sql);
}

function get_list_th_sp($id){
    $sql = "SELECT *
    FROM sanpham
    JOIN danhmuc ON sanpham.id_danh_muc = danhmuc.id_danh_muc
    JOIN thuong_hieu ON sanpham.id_thuong_hieu = thuong_hieu.id_thuong_hieu WHERE thuong_hieu.id_thuong_hieu = $id";
    return pdo_query($sql);
}

function update_th($name,$id){
$sql = "UPDATE thuong_hieu SET ten_thuong_hieu = ? WHERE id_thuong_hieu = $id";
return pdo_execute($sql,$name);
}


function add_th($name){
    $sql = "INSERT INTO `thuong_hieu`(`ten_thuong_hieu`) VALUES (?)";
    return pdo_execute($sql,$name);
    }



    function get_th_hide(){
        $sql = "SELECT * FROM thuong_hieu WHERE `status` = 1";
        return pdo_query($sql);
    }
    function set_th_view( $id){
        $sql = "UPDATE thuong_hieu SET `status` = 0 WHERE id_thuong_hieu = $id";
        return pdo_query($sql);
    }

    
    function an_th($id_th){
        if ($id_th == 21) {
           return false;
        }
        else{
            $sql_dm = "UPDATE thuong_hieu SET `status` = 1 WHERE id_thuong_hieu = $id_th";
        pdo_execute($sql_dm);
    
        $sql = "UPDATE sanpham SET id_thuong_hieu = 21 WHERE id_thuong_hieu = $id_th";
       pdo_execute($sql);
       return true;
        }
        
    }



