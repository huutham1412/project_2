<?php
require_once 'pdo.php';

function tin_tuc_insert($tieu_de, $intro, $noi_dung1, $anh_chinh, $noi_dung2){
    $sql = "INSERT INTO tin_tuc(tieu_de, intro, noi_dung1, anh_chinh, noi_dung2) VALUES ('$tieu_de','$intro','$noi_dung1','$anh_chinh','$noi_dung2')";
    return pdo_execute_lastInsertId($sql);
}
function tin_tuc_img_insert($id_tin_tuc,$anh){
    $sql = "INSERT INTO anh_tin_tuc(id_tin_tuc,anh) VALUES ('$id_tin_tuc','$anh')";
    pdo_execute($sql);
}

function tin_tuc_update($tieu_de, $intro, $noi_dung1, $anh_chinh, $noi_dung2,$id_tin_tuc){
    $sql = "UPDATE tin_tuc SET tieu_de=?,intro=?,noi_dung1=?,anh_chinh=?,noi_dung2=? WHERE id_tin_tuc=?";
    pdo_execute($sql, $tieu_de, $intro, $noi_dung1, $anh_chinh, $noi_dung2,$id_tin_tuc );
}

function tin_tuc_delete($id_tin_tuc){
    $sql = "DELETE FROM tin_tuc WHERE id_tin_tuc=?";
    if(is_array($id_tin_tuc)){
        foreach ($id_tin_tuc as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_tin_tuc);
    }
}
function tin_tuc_image_delete($id_tin_tuc){
    $sql = "DELETE FROM anh_tin_tuc WHERE id_tin_tuc=?";
    if(is_array($id_tin_tuc)){
        foreach ($id_tin_tuc as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_tin_tuc);
    }
}

function tin_tuc_select_all(){
    $sql = "SELECT * FROM tin_tuc ORDER BY id_tin_tuc desc";
    return pdo_query($sql);
}
function tin_tuc_select_alls(){
    $sql = "SELECT * FROM tin_tuc ORDER BY id_tin_tuc desc limit 1,6";
    return pdo_query($sql);
}

function tin_tuc_select_by_id($id_tin_tuc){
    $sql = "SELECT * FROM tin_tuc WHERE id_tin_tuc=?";
    return pdo_query_one($sql, $id_tin_tuc);
}

function tin_tuc_img_select_by_id($id_tin_tuc){
    $sql = "SELECT * FROM anh_tin_tuc WHERE id_tin_tuc=?";
    return pdo_query($sql, $id_tin_tuc);
}

function tin_tuc_exist($id_tin_tuc){
    $sql = "SELECT count(*) FROM tin_tuc WHERE id_tin_tuc=?";
    return pdo_query_value($sql, $id_tin_tuc) > 0;
}

function tin_tuc_exist_add($ten_tin_tuc)
{
    $sql = "SELECT count(*) FROM tin_tuc WHERE ten_tin_tuc=?";
    return pdo_query_value($sql, $ten_tin_tuc) > 0;
}
