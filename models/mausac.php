<?php
require_once 'pdo.php';

function mau_sac_insert($ten_mau_sac){
    $sql = "INSERT INTO mau_sac(ten_mau_sac) VALUES(?)";
    pdo_execute($sql, $ten_mau_sac);
}
function mau_sac_update($id_mau_sac, $ten_mau_sac){
    $sql = "UPDATE mau_sac SET ten_mau_sac=? WHERE id_mau_sac=?";
    pdo_execute($sql, $ten_mau_sac, $id_mau_sac);
}
function mau_sac_delete($id_mau_sac){
    $sql = "DELETE FROM mau_sac WHERE id_mau_sac=?";
    if(is_array($id_mau_sac)){
        foreach ($id_mau_sac as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_mau_sac);
    }
}
function mau_sac_select_all($order ='DESC'){
    $sql = "SELECT * FROM mau_sac ORDER BY id_mau_sac $order";
    return pdo_query($sql);
}
function mau_sac_select_by_id($id_mau_sac){
    $sql = "SELECT * FROM mau_sac WHERE id_mau_sac=?";
    return pdo_query_one($sql, $id_mau_sac);
}