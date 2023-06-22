<?php
require_once 'pdo.php';

function gioi_tinh_select_all($order ='DESC'){
    $sql = "SELECT * FROM gioi_tinh ORDER BY id_gioi_tinh $order";
    return pdo_query($sql);
}
function gioi_tinh_select_by_id($id_gioi_tinh){
    $sql = "SELECT * FROM gioi_tinh WHERE id_gioi_tinh=?";
    return pdo_query_one($sql, $id_gioi_tinh);
}
