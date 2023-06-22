<?php
require_once 'pdo.php';

function san_pham_insert($ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet,$dac_diem,$id_danh_muc){
    $sql = "INSERT INTO san_pham(ten_san_pham, anh, mo_ta, gia, giam_gia,so_luong, dac_biet,dac_diem, id_danh_muc) VALUES (?,?,?,?,?,?,?,?,?)";
   return pdo_execute_lastInsertId($sql,$ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet == 1,$dac_diem,$id_danh_muc);
}

function san_pham_img_insert($id_san_pham,$anh){
    $sql = "INSERT INTO anh_san_pham(id_san_pham,anh) VALUES ('$id_san_pham','$anh')";
    pdo_execute($sql);
}

function san_pham_size_insert($id_san_pham,$id_kich_co){
    $sql = "INSERT INTO san_pham_size(id_san_pham,id_size) VALUES ('$id_san_pham','$id_kich_co')";
    pdo_execute($sql);
}

function san_pham_mau_insert($id_san_pham,$id_mau){
    $sql = "INSERT INTO san_pham_mau(id_san_pham,id_mau) VALUES ('$id_san_pham','$id_mau')";
    pdo_execute($sql);
}

function san_pham_update($id_san_pham,$ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet, $dac_diem, $id_danh_muc){
    $sql = "UPDATE san_pham SET ten_san_pham=?,anh=?,mo_ta=?,gia=?,giam_gia=?,so_luong=?,dac_biet=?,dac_diem=?,id_danh_muc=? WHERE id_san_pham=?";
    pdo_execute($sql, $ten_san_pham, $anh, $mo_ta, $gia, $giam_gia,$so_luong, $dac_biet == 1, $dac_diem, $id_danh_muc,$id_san_pham);
}

function san_pham_delete($id_san_pham){
    $sql = "DELETE FROM san_pham WHERE  id_san_pham=?";
    if(is_array($id_san_pham)){
        foreach ($id_san_pham as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_san_pham);
    }
}

function san_pham_image_delete($id_san_pham){
    $sql = "DELETE FROM anh_san_pham WHERE id_san_pham=?";
    if(is_array($id_san_pham)){
        foreach ($id_san_pham as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_san_pham);
    }
}

function san_pham_size_delete($id_san_pham){
    $sql = "DELETE FROM san_pham_size WHERE id_san_pham=?";
    if(is_array($id_san_pham)){
        foreach ($id_san_pham as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_san_pham);
    }
}
function san_pham_mau_delete($id_san_pham){
    $sql = "DELETE FROM san_pham_mau WHERE id_san_pham=?";
    if(is_array($id_san_pham)){
        foreach ($id_san_pham as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_san_pham);
    }
}

function san_pham_select_all(){
    $sql = "SELECT * FROM san_pham ORDER BY id_san_pham desc LIMIT";
    return pdo_query($sql);
}
function san_pham_cung_loai($id_danh_muc){
    $sql = "SELECT * FROM san_pham WHERE id_danh_muc = ? ORDER BY RAND() LIMIT 4";
    return pdo_query($sql,$id_danh_muc);
}
function san_pham_select_by_id($id_san_pham){
    $sql = "SELECT * FROM san_pham WHERE id_san_pham=?";
    return pdo_query_one($sql, $id_san_pham);
}

function san_pham_img_select_by_id($id_san_pham){
    $sql = "SELECT * FROM anh_san_pham WHERE id_san_pham=?";
    return pdo_query($sql, $id_san_pham);
}


function san_pham_select_dac_biet_nam(){
    $sql = "SELECT * FROM san_pham WHERE dac_biet=2";
    return pdo_query($sql);
}
function san_pham_select_dac_biet_nu(){
    $sql = "SELECT * FROM san_pham WHERE dac_biet=3";
    return pdo_query($sql);
}
function san_pham_select_dac_biet_te(){
    $sql = "SELECT * FROM san_pham WHERE dac_biet=4";
    return pdo_query($sql);
}


function san_pham_select_by_danh_muc($id_danh_muc){
    $sql = "SELECT * FROM san_pham WHERE id_danh_muc=?";
    return pdo_query($sql, $id_danh_muc);
}


function san_pham_select_keyword($keyword){
    $sql = "SELECT * FROM san_pham hh 
            JOIN danh_muc dm ON dm.id_danh_muc=hh.id_danh_muc 
            WHERE ten_san_pham LIKE ? OR ten_danh_muc LIKE ?
            ORDER BY id_san_pham DESC";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}

function kich_co_select_all(){
    $sql = "SELECT * FROM kich_co ";
    return pdo_query($sql);
}

function san_pham_select_alls(){
    $sql = "SELECT s.*,d.ten_danh_muc FROM san_pham s 
    JOIN danh_muc d ON d.id_danh_muc=s.id_danh_muc";
    return pdo_query($sql);
}

function san_pham_select_allss($begin){
    $sql = "SELECT s.*,d.ten_danh_muc FROM san_pham s 
    JOIN danh_muc d ON d.id_danh_muc=s.id_danh_muc
    ORDER BY id_san_pham DESC LIMIT $begin,4";
    return pdo_query($sql);
}
function san_pham_count(){
    $sql = "SELECT COUNT(id_san_pham) as dem FROM san_pham";
    return pdo_query_one($sql);
}
function san_pham_select_mau($id_san_pham){
    $sql = "SELECT m.ten_mau_sac FROM mau_sac m 
    JOIN san_pham_mau sm ON sm.id_mau=m.id_mau_sac
    where id_san_pham=?";
    return pdo_query($sql,$id_san_pham);
}
function san_pham_select_size($id_san_pham){
    $sql = "SELECT k.ten_kich_co, sz.id_size FROM kich_co k 
    JOIN san_pham_size sz ON sz.id_size=k.id_kich_co
    where id_san_pham=?";
    return pdo_query($sql,$id_san_pham);
}
function san_pham_select_so_luong($id_san_pham){
    $sql = "SELECT so_luong FROM san_pham WHERE id_san_pham =?";
    return pdo_query_one($sql,$id_san_pham);
}
function san_pham_update_so_luong($id_san_pham,$so_luong){
    $sql = "UPDATE san_pham SET so_luong=? WHERE id_san_pham=?";
    pdo_execute($sql,$so_luong,$id_san_pham);
}
