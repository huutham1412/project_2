<?php
require_once 'pdo.php';

function gioi_thieu_select_all(){
    $sql = "SELECT * FROM gioi_thieu";
    return pdo_query($sql);
}
function gioi_thieu_update($id_gioi_thieu, $tieu_de, $anh, $noi_dung){
    $sql = "UPDATE gioi_thieu SET tieu_de=?, anh=?, noi_dung=? WHERE id_gioi_thieu=?";
    pdo_execute($sql, $tieu_de, $anh, $noi_dung, $id_gioi_thieu);
}
function gioi_thieu_select_by_id($id_gioi_thieu)
{
    $sql = "SELECT * FROM gioi_thieu WHERE id_gioi_thieu=?";
    return pdo_query_one($sql, $id_gioi_thieu);
}
