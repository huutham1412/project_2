<?php
require_once 'pdo.php';
function bill_insert($id_tai_khoan,$ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$tong_don_hang,$trang_thai_don_hang){
    $sql = "insert into bill(id_tai_khoan,ho_ten,dia_chi,sdt,email,phuong_thuc_dat_hang,ngay_dat_hang,total,trang_thai_don_hang) values ('$id_tai_khoan','$ho_ten','$dia_chi','$sdt','$email','$pttt','$ngay_dat_hang','$tong_don_hang','$trang_thai_don_hang')";
    return pdo_execute_lastInsertId($sql);
}
function bill_update($ttdh,$id_bill){
    $sql = "UPDATE bill SET trang_thai_don_hang=? WHERE id_bill=?";
    pdo_execute($sql,$ttdh, $id_bill);
}
function cart_insert($ten,$gia,$so_luong,$size,$mau,$thanh_tien,$id_bill,$id_tai_khoan,$id_san_pham){
    $sql = "insert into cart(ten,gia,so_luong,size,mau,thanh_tien,id_bill,id_tai_khoan,id_san_pham) values ('$ten','$gia','$so_luong','$size','$mau','$thanh_tien','$id_bill','$id_tai_khoan','$id_san_pham')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "select * from bill where id_bill=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function load_all_bill($iduser){
    $sql = "SELECT * from bill where id_tai_khoan=".$iduser;
    return pdo_query($sql);
}
function load_all_bills(){
    $sql = "SELECT * from bill";
    return pdo_query($sql);
}
function tong_don_hang(){
    $tong = 0;
    foreach($_SESSION['mycart'] as $cart){
        $ttien = $cart[3]  * $cart[4];
        $tong+=$ttien;
    }
    return $tong;
}
function count_cart($id_bill){
    $sql = "select * from cart where id_bill =".$id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function get_ttdh($n){
    switch($n){
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao xong";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function bill_delete($id_bill){
    $sql = "DELETE FROM bill WHERE id_bill=?";
    if(is_array($id_bill)){
        foreach ($id_bill as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_bill);
    }
}
function cart_delete($id_cart){
    $sql = "DELETE FROM cart WHERE id_cart=?";
    if(is_array($id_cart)){
        foreach ($id_cart as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_cart);
    }
}
function select_id_cart($id_bill){
    $sql = "SELECT c.id_cart FROM cart c 
    INNER JOIN bill b ON b.id_bill=c.id_bill
    WHERE b.id_bill =?";
    return pdo_query($sql,$id_bill);
}
function bill_select_by_id($id_bill){
    $sql = "SELECT * FROM bill WHERE id_bill=?";
    return pdo_query_one($sql, $id_bill);
}
function cart_select_by_id($id_bill){
    $sql = "SELECT * FROM cart WHERE id_bill=?";
    return pdo_query($sql, $id_bill);
}

