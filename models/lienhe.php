<?php
require_once 'pdo.php';

function lien_he_insert($ho_ten,$email,$noi_dung,$ngay_lien_he){
    $sql = "INSERT INTO lien_he(ho_ten,email,noi_dung,ngay_lien_he) VALUES(?,?,?,?)";
    pdo_execute($sql, $ho_ten,$email,$noi_dung,$ngay_lien_he);
}
function lien_he_select_all($order ='DESC'){
    $sql = "SELECT * FROM lien_he ORDER BY id_lien_he $order";
    return pdo_query($sql);
}
function lien_he_delete($id_lien_he){
    $sql = "DELETE FROM lien_he WHERE  id_lien_he=?";
    if(is_array($id_lien_he)){
        foreach ($id_lien_he as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_lien_he);
    }
}