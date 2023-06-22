<?php
require_once 'pdo.php';
function tai_khoan_insert($ten_dang_nhap, $mat_khau, $ho_ten, $email, $anh, $vai_tro)
{
    $sql = "INSERT INTO tai_khoan(ten_dang_nhap,mat_khau,ho_ten,email,anh,vai_tro) VALUES(?,?,?,?,?,?)";
    pdo_execute($sql, $ten_dang_nhap, $mat_khau, $ho_ten, $email, $anh, $vai_tro == 1);
}
function tai_khoan_update($ten_dang_nhap,  $mat_khau, $ho_ten, $email, $anh, $vai_tro)
{
    $sql = "UPDATE tai_khoan SET mat_khau=?,ho_ten=?,email=?,anh=?,vai_tro=? WHERE ten_dang_nhap=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $email, $anh ,$vai_tro == 1, $ten_dang_nhap);
}
function tai_khoan_delete($id_tai_khoan)
{
    $sql = "DELETE FROM tai_khoan WHERE id_tai_khoan=?";
    if (is_array($id_tai_khoan)) {
        foreach ($id_tai_khoan as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_tai_khoan);
    }
}
function tai_khoan_select_all()
{
    $sql = "SELECT * FROM tai_khoan";
    return pdo_query($sql);
}
function tai_khoan_select_by_id($id_tai_khoan)
{
    $sql = "SELECT * FROM tai_khoan WHERE id_tai_khoan=?";
    return pdo_query_one($sql, $id_tai_khoan);
}
function tai_khoan_exist($ten_dang_nhap)
{
    $sql = "SELECT count(*) FROM tai_khoan WHERE ten_dang_nhap=?";
    return pdo_query_value($sql, $ten_dang_nhap) > 0;
}

function tai_khoan_exist_email($email)
{
    $sql = "SELECT count(*) FROM tai_khoan WHERE email=?";
    return pdo_query_value($sql, $email) > 0;
}

function tai_khoan_change_password($ten_dang_nhap, $mat_khau_moi)
{
    $sql = "UPDATE tai_khoan SET mat_khau=? WHERE ten_dang_nhap=?";
    pdo_execute($sql, $mat_khau_moi, $ten_dang_nhap);
}


function tai_khoan_check($ten_dang_nhap,$mat_khau){
    $sql = "SELECT * FROM tai_khoan WHERE ten_dang_nhap ='".$ten_dang_nhap."' AND mat_khau ='".$mat_khau."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function tai_khoan_check_email($email){
    $sql = "SELECT * FROM tai_khoan WHERE email ='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}