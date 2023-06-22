<?php
require_once 'pdo.php';

function load_all_thongke(){
    $sql = "select danh_muc.id_danh_muc as maloai, danh_muc.ten_danh_muc as tenloai, count(san_pham.id_san_pham) as countsp, min(san_pham.gia) as mingia, max(san_pham.gia) as maxgia, avg(san_pham.gia) as tb
    from san_pham inner join danh_muc on danh_muc.id_danh_muc = san_pham.id_danh_muc group by danh_muc.id_danh_muc order by danh_muc.id_danh_muc desc";
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}
function count_san_pham(){
    $sql = "SELECT COUNT(ten_san_pham) as dem from san_pham";
    return pdo_query_one($sql);
}
function count_tai_khoan(){
    $sql = "SELECT COUNT(id_tai_khoan) as dem from tai_khoan";
    return pdo_query_one($sql);
}
function thong_ke_select_by_giao_xong(){
    $sql = "SELECT * FROM bill WHERE trang_thai_don_hang = 3";
    return pdo_query($sql);
}
function san_pham_ban_chay_nhat(){
    $sql ="SELECT *,sum(so_luong) as sl from cart group by id_san_pham order by sl desc LIMIT 0,5";
    return pdo_query($sql);
}
function count_dh_moi(){
    $sql ="SELECT COUNT(id_bill)as dem, SUM(total) as tong from bill where trang_thai_don_hang = 0";
    return pdo_query_one($sql);
}
function count_dh_dxl(){
    $sql ="SELECT COUNT(id_bill)as dem, SUM(total) as tong from bill where trang_thai_don_hang = 1";
    return pdo_query_one($sql);
}
function count_dh_dg(){
    $sql ="SELECT COUNT(id_bill)as dem, SUM(total) as tong from bill where trang_thai_don_hang = 2";
    return pdo_query_one($sql);
}
function count_dh_dx(){
    $sql ="SELECT COUNT(id_bill)as dem, SUM(total) as tong from bill where trang_thai_don_hang = 3";
    return pdo_query_one($sql);
}
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}