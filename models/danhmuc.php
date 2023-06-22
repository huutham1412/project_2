<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_danh_muc là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danh_muc_insert($ten_danh_muc,$id_gioi_tinh){
    $sql = "INSERT INTO danh_muc(ten_danh_muc,id_gioi_tinh) VALUES(?,?)";
    pdo_execute($sql, $ten_danh_muc,$id_gioi_tinh);
}
/**
 * Cập nhật tên loại
 * @param int $ma_danh_muc là mã loại cần cập nhật
 * @param String $ten_danh_muc là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function danh_muc_update($id_danh_muc, $ten_danh_muc,){
    $sql = "UPDATE danh_muc SET ten_danh_muc=? WHERE id_danh_muc=?";
    pdo_execute($sql, $ten_danh_muc, $id_danh_muc);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_danh_muc là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danh_muc_delete($id_danh_muc){
    $sql = "DELETE FROM danh_muc WHERE id_danh_muc=?";
    if(is_array($id_danh_muc)){
        foreach ($id_danh_muc as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_danh_muc);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danh_muc_select_all($order ='DESC'){
    $sql = "SELECT * FROM danh_muc ORDER BY id_danh_muc $order";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_danh_muc là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danh_muc_select_by_id($id_danh_muc){
    $sql = "SELECT * FROM danh_muc WHERE id_danh_muc=?";
    return pdo_query_one($sql, $id_danh_muc);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_danh_muc là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function danh_muc_exist($id_danh_muc){
    $sql = "SELECT count(*) FROM danh_muc WHERE id_danh_muc=?";
    return pdo_query_value($sql, $id_danh_muc) > 0;
}

function danh_muc_select_nam(){
    $sql = "SELECT * FROM danh_muc WHERE id_gioi_tinh=1";
    return pdo_query($sql);
}
function danh_muc_select_nu(){
    $sql = "SELECT * FROM danh_muc WHERE id_gioi_tinh=2";
    return pdo_query($sql);
}
function danh_muc_select_te(){
    $sql = "SELECT * FROM danh_muc WHERE id_gioi_tinh=3";
    return pdo_query($sql);
}