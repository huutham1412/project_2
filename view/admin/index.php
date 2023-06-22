<?php
session_start();
include 'header.php';
include '../../models/danhmuc.php';
include '../../models/gioitinh.php';
include '../../models/sanpham.php';
include '../../models/taikhoan.php';
include '../../models/lienhe.php';
include '../../models/gioithieu.php';
include '../../models/mausac.php';
include '../../models/thongke.php';
include '../../models/tintuc.php';
include '../../models/cart.php';
include '../../models/binhluan.php';
// include '../../models/cart.php';

/*------------------------THỐNG KÊ---------------------- */
$list_thongke = load_all_thongke();
$count_san_pham = count_san_pham();
$count_tai_khoan = count_tai_khoan();
$ban_chay = san_pham_ban_chay_nhat();
$don_hang_moi = count_dh_moi();
$dxl = count_dh_dxl();
$dg = count_dh_dg();
$dx = count_dh_dx();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'doanhthu':
            $san_pham_da_giao = thong_ke_select_by_giao_xong();
            $doanh_thu = 0;
            foreach ($san_pham_da_giao as $key => $value) {
                $doanh_thu+= $value['total'];
            }
            var_dump($doanh_thu);
            include 'home.php';
            break;
            /* ------------------------DANH MỤC -----------------------*/
        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $id_gioi_tinh = $_POST['id_gioi_tinh'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                danh_muc_insert($ten_danh_muc, $id_gioi_tinh);
                $thongbao = "Thêm thành công";
            }
            $list_gt = gioi_tinh_select_all();
            include 'danh_muc/add.php';
            break;
        case 'listdm':
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;
        case 'xoadm':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $id_danh_muc = $_GET['id_danh_muc'];
                $xoa = danh_muc_delete($id_danh_muc);
                $thongbao = "Xóa thành công";
            }
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $dm = danh_muc_select_by_id($_GET['id_danh_muc']);
            }
            include 'danh_muc/update.php';
            break;
        case 'updm':
            if (isset($_POST['capnhat'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                danh_muc_update($id_danh_muc, $ten_danh_muc);
                $thongbao = "Sửa thành công";
            }
            $list = danh_muc_select_all();
            include 'danh_muc/list.php';
            break;

            /* ------------------------SẢN PHẨM -----------------------*/
        case 'addsp':
            if (isset($_POST['themmoi'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $giam_gia = $_POST['giam_gia'];
                $dac_biet = $_POST['dac_biet'];
                $dac_diem = $_POST['dac_diem'];
                $so_luong = $_POST['so_luong'];
                $mo_ta = $_POST['mo_ta'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 8000000; /*byte sang mb*/
                $upload = true;
                $dir = "../../uploaded/images/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);

                if (isset($_FILES['anh'])) {
                    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                        $upload = false;
                        $thongbao = "File không phải ảnh";
                    } else {
                        move_uploaded_file($img['tmp_name'], $target_file);
                    }
                }
                $id_san_pham = san_pham_insert($ten_san_pham, $imgname, $mo_ta, $gia, $giam_gia, $so_luong, $dac_biet, $dac_diem, $id_danh_muc);
                //Mảng ảnh mô tả
                if (isset($_FILES['anhs'])) {
                    $file = $_FILES['anhs'];
                    $file_names = $file['name'];
                    foreach ($file_names as $key => $value) {
                        move_uploaded_file($file['tmp_name'][$key], '../../uploaded/images/' . $value);
                        san_pham_img_insert($id_san_pham, $value);
                        $thongbao = "Thêm thành công";
                    }
                }
                // List các kích cỡ
                if (isset($_POST['id_kich_co'])) {
                    $size = $_POST['id_kich_co'];
                    foreach ($size as $key => $value) {
                        san_pham_size_insert($id_san_pham, $value);
                        $thongbao = "Thêm thành công";
                    }
                }
                // List màu sắc
                if (isset($_POST['id_mau_sac'])) {
                    $mau = $_POST['id_mau_sac'];
                    foreach ($mau as $key => $value) {
                        san_pham_mau_insert($id_san_pham, $value);
                        $thongbao = "Thêm thành công";
                    }
                }
            }
            $listdanhmuc = danh_muc_select_all();
            $listkichco = kich_co_select_all();
            $listmausac = mau_sac_select_all();
            include 'sanpham/add.php';
            break;
        case 'listhh':
            if(isset($_GET['trang'])){
                $page = $_GET['trang'];
            } else{
                $page = 1;
            }
            if($page == '' || $page == 1){
                $begin = 0;
            }else{
                $begin = ($page*4)-4;
            }
            $listhh = san_pham_select_allss($begin);
            $count = san_pham_count();
            $trang = ceil($count["dem"]/4);  
            include 'sanpham/list.php';
            break;
        case 'list_search':
            $kyw = $_POST['kyw'];
            $items = san_pham_select_keyword($kyw);
            $count = san_pham_count();
            $trang = ceil($count["dem"]/4); 
            include 'sanpham/list_search.php';
            break;
        case 'xoasp':
            if (isset($_GET['id_san_pham'])) {
                $id_san_pham = $_GET['id_san_pham'];
                $xoa_img = san_pham_image_delete($id_san_pham);
                $xoa_mau = san_pham_mau_delete($id_san_pham);
                $xoa_size = san_pham_size_delete($id_san_pham);
                $xoa = san_pham_delete($id_san_pham);
                
                $thongbao = "Xóa thành công";
            }
            $listhh = san_pham_select_alls();
            include 'sanpham/list.php';
            break;
        case 'suasp':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $hh = san_pham_select_by_id($_GET['id_san_pham']);
                $hh_img = san_pham_img_select_by_id($_GET['id_san_pham']);
            }
            $hang_hoa_info = san_pham_select_by_id($_GET['id_san_pham']);
            $mau_info = san_pham_select_mau($_GET['id_san_pham']);
            $size_info = san_pham_select_size($_GET['id_san_pham']);
            $listdm = danh_muc_select_all();
            $listkichco = kich_co_select_all();
            $listmausac = mau_sac_select_all();
            include 'sanpham/update.php';
            break;
        case 'upsp':
            if (isset($_POST['capnhat'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $giam_gia = $_POST['giam_gia'];
                $dac_biet = $_POST['dac_biet'];
                $dac_diem = $_POST['dac_diem'];
                $so_luong = $_POST['so_luong'];
                $mo_ta = $_POST['mo_ta'];
                $img = $_FILES['anh'];
                $hinh = $_POST['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 8000000; /*byte sang mb*/
                $upload = true;
                $dir = "../../uploaded/images/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['anh']['size'] > 0) {
                    $hinh = $_FILES['anh']['name'];
                }
                $ext = pathinfo($hinh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    san_pham_update($id_san_pham, $ten_san_pham, $hinh, $mo_ta, $gia, $giam_gia, $so_luong, $dac_biet, $dac_diem, $id_danh_muc);
                    $thongbao = "Sửa thành công";
                }

                //Mảng ảnh mô tả
                if (isset($_FILES['anhmt'])) {
                    $file = $_FILES['anhmt'];
                    $file_names = $file['name'];
                    if (!empty($file_names[0])) {
                        san_pham_image_delete($id_san_pham);
                        foreach ($file_names as $key => $value) {
                            move_uploaded_file($file['tmp_name'][$key], '../../uploaded/images/' . $value);
                            san_pham_img_insert($id_san_pham, $value);
                            // $thongbao = "Thêm thành công";
                        }
                    }
                }
                if (isset($_POST['id_kich_co'])) {
                    $size = $_POST['id_kich_co'];
                    san_pham_size_delete($id_san_pham);
                    foreach ($size as $key => $value) {
                        san_pham_size_insert($id_san_pham, $value);
                        // $thongbao = "Thêm thành công";
                    }
                }
                if (isset($_POST['id_mau_sac'])) {
                    $mau = $_POST['id_mau_sac'];
                    san_pham_mau_delete($id_san_pham);
                    foreach ($mau as $key => $value) {
                        san_pham_mau_insert($id_san_pham, $value);
                        // $thongbao = "Thêm thành công";
                    }
                }
            }

            $listhh = san_pham_select_alls();
            include 'sanpham/list.php';
            break;
        

            /*------------------------KHÁCH HÀNG---------------------- */
        case 'addtk':
            if (isset($_POST['themmoi'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau2 = $_POST['mat_khau2'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 300000;
                $upload = true;
                $dir = "../../uploaded/user/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($mat_khau != $mat_khau2) {
                    $upload = false;
                    $thongbao = "Nhập lại mật khẩu không đúng";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tai_khoan_insert($ten_dang_nhap, $mat_khau, $ho_ten, $email, $imgname, $vai_tro);
                    $thongbao = "Thêm thành công";
                }
            }
            include 'taikhoan/add.php';
            break;
        case 'listtk':
            $listkh = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;
        case 'xoatk':
            if (isset($_GET['id_tai_khoan'])) {
                $id_tai_khoan = $_GET['id_tai_khoan'];
                $xoa = tai_khoan_delete($id_tai_khoan);
                $thongbao = "Xóa thành công";
            }
            $list = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;
        case 'suatk':
            if (isset($_GET['id_tai_khoan'])) {
                $tk = tai_khoan_select_by_id($_GET['id_tai_khoan']);
            }
            $listkh = tai_khoan_select_all();
            include 'taikhoan/update.php';
            break;
        case 'uptk':
            if (isset($_POST['capnhat'])) {
                $id_tai_khoan = $_POST['id_tai_khoan'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau2 = $_POST['mat_khau2'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $anh  = $_POST['hinh'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $maxSize = 3000000;
                $upload = true;
                $dir = "../../uploaded/user/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['hinh']['size'] > 0) {
                    $anh = $imgname;
                }
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($mat_khau != $mat_khau2) {
                    $upload = false;
                    $thongbao = "Nhập lại mật khẩu không đúng";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tai_khoan_update($id_tai_khoan, $mat_khau, $ho_ten, $email, $anh, $vai_tro);
                    $thongbao = "Sửa thành công";
                }
            }
            $listkh = tai_khoan_select_all();
            include 'taikhoan/list.php';
            break;

            /* ------------------------LIÊN HỆ -----------------------*/
        case 'listlh':
            $list = lien_he_select_all();
            include 'lienhe/list.php';
            break;
        case 'xoalh':
            if (isset($_GET['id_lien_he'])) {
                $id_lien_he = $_GET['id_lien_he'];
                $xoa = lien_he_delete($id_lien_he);
                $thongbao = "Xóa thành công";
            }
            $list = lien_he_select_all();
            include 'lienhe/list.php';
            break;

            /* ------------------------GIỚI THIỆU -----------------------*/
        case 'listgt':
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/list.php';
            break;
        case 'suagt':
            if (isset($_GET['id_gioi_thieu'])) {
                $tk = gioi_thieu_select_by_id($_GET['id_gioi_thieu']);
            }
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/update.php';
            break;
        case 'upgt':
            if (isset($_POST['capnhat'])) {
                $id_gioi_thieu = $_POST['id_gioi_thieu'];
                $tieu_de = $_POST['tieu_de'];
                $noi_dung = $_POST['noi_dung'];
                $anh  = $_POST['hinh'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $upload = true;
                $dir = "../../uploaded/images/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['hinh']['size'] > 0) {
                    $anh = $imgname;
                }
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    gioi_thieu_update($id_gioi_thieu, $tieu_de, $anh, $noi_dung);
                    $thongbao = "Sửa thành công";
                }
            }
            $list = gioi_thieu_select_all();
            include 'gioi_thieu/list.php';
            break;

            /*------------------------MÀU SẮC---------------------- */
        case 'addms':
            if (isset($_POST['themmoi'])) {
                $ten_mau_sac = $_POST['ten_mau_sac'];
                mau_sac_insert($ten_mau_sac);
                $thongbao = "Thêm thành công";
            }
            include 'mausac/add.php';
            break;
        case 'listms':
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;
        case 'xoams':
            if (isset($_GET['id_mau_sac']) && ($_GET['id_mau_sac'] > 0)) {
                $id_mau_sac = $_GET['id_mau_sac'];
                $xoa = mau_sac_delete($id_mau_sac);
                $thongbao = "Xóa thành công";
            }
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;
        case 'suams':
            if (isset($_GET['id_mau_sac']) && ($_GET['id_mau_sac'] > 0)) {
                $ms = mau_sac_select_by_id($_GET['id_mau_sac']);
            }
            include 'mausac/update.php';
            break;
        case 'upms':
            if (isset($_POST['capnhat'])) {
                $id_mau_sac = $_POST['id_mau_sac'];
                $ten_mau_sac = $_POST['ten_mau_sac'];
                mau_sac_update($id_mau_sac, $ten_mau_sac);
                $thongbao = "Sửa thành công";
            }
            $list = mau_sac_select_all();
            include 'mausac/list.php';
            break;

            /*------------------------TIN TỨC---------------------- */
        case 'addtt':
            if (isset($_POST['themmoi'])) {
                $tieu_de = $_POST['tieu_de'];
                $intro = $_POST['intro'];
                $noi_dung1 = $_POST['noi_dung1'];
                $noi_dung2 = $_POST['noi_dung2'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $upload = true;
                $dir = "../../uploaded/tintuc/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);

                if (isset($_FILES['hinh'])) {
                    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                        $upload = false;
                        $thongbao = "File không phải ảnh";
                    } else {
                        move_uploaded_file($img['tmp_name'], $target_file);
                    }
                }
                $id_tin = tin_tuc_insert($tieu_de, $intro, $noi_dung1, $imgname, $noi_dung2);
                //Mảng ảnh mô tả
                if (isset($_FILES['hinhs'])) {
                    $file = $_FILES['hinhs'];
                    $file_names = $file['name'];
                    foreach ($file_names as $key => $value) {
                        move_uploaded_file($file['tmp_name'][$key], '../../uploaded/tintuc/' . $value);
                        tin_tuc_img_insert($id_tin, $value);
                        $thongbao = "Thêm thành công";
                    }
                }
            }
            include 'tintuc/add.php';
            break;
        case 'listtt':
            $list = tin_tuc_select_all();
            include 'tintuc/list.php';
            break;
        case 'xoatt':
            if (isset($_GET['id_tin_tuc'])) {
                $id_tin_tuc = $_GET['id_tin_tuc'];
                $xoa = tin_tuc_delete($id_tin_tuc);
                $xoa_img = tin_tuc_image_delete($id_tin_tuc);
                $thongbao = "Xóa thành công";
            }
            $list = tin_tuc_select_all();
            include 'tintuc/list.php';
            break;
        case 'suatt':
            if (isset($_GET['id_tin_tuc'])) {
                $tin = tin_tuc_select_by_id($_GET['id_tin_tuc']);
                $tin_img = tin_tuc_img_select_by_id($_GET['id_tin_tuc']);
            }

            $list = tin_tuc_select_all();
            include 'tintuc/update.php';
            break;
        case 'uptt':
            if (isset($_POST['capnhat'])) {
                $id_tin_tuc = $_POST['id_tin_tuc'];
                $tieu_de = $_POST['tieu_de'];
                $intro = $_POST['intro'];
                $noi_dung1 = $_POST['noi_dung1'];
                $noi_dung2 = $_POST['noi_dung2'];
                $anh  = $_POST['hinh'];
                $img = $_FILES['hinh'];
                $imgname = $_FILES['hinh']['name'];
                $upload = true;
                $dir = "../../uploaded/tintuc/";
                $target_file = $dir . basename($img['name']);

                if ($_FILES['hinh']['size'] > 0) {
                    $anh = $_FILES['hinh']['name'];
                }
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tin_tuc_update($tieu_de, $intro, $noi_dung1, $anh, $noi_dung2, $id_tin_tuc);
                    $thongbao = "Sửa thành công";
                }

                //Mảng ảnh mô tả
                if (isset($_FILES['hinhmt'])) {
                    $file = $_FILES['hinhmt'];
                    $file_names = $file['name'];
                    if (!empty($file_names[0])) {
                        tin_tuc_image_delete($id_tin_tuc);
                        foreach ($file_names as $key => $value) {
                            move_uploaded_file($file['tmp_name'][$key], '../../uploaded/tintuc/' . $value);
                            tin_tuc_img_insert($id_tin_tuc, $value);
                            // $thongbao = "Thêm thành công";
                        }
                    }
                }
            }
            $list = tin_tuc_select_all();
            include 'tintuc/list.php';
            break;
            
        /*------------------------ GIỎ HÀNG ---------------------- */
        case 'list_cart':
            $list_bill = load_all_bills();
            include 'cart/list.php';
            break;
        // case 'xoa_cart':
        //     if (isset($_GET['id_bill'])) {
        //         $id_bill = $_GET['id_bill'];
        //         $id_cart = select_id_cart($id_bill);
        //         $xoa_cart = cart_delete($id_cart);
        //         $xoa_bill = bill_delete($id_bill);
        //         $thongbao = "Xóa thành công";
        //     }
        //     $list_bill = load_all_bills();
        //     include 'cart/list.php';
        //     break;
        case 'sua_bill':
            $bill_by_id = bill_select_by_id($_GET['id_bill']);
            $cart_by_id = cart_select_by_id($_GET['id_bill']);
            include 'cart/update.php';
            break;
        case 'update_bill':
            if(isset($_POST['update'])){
                $trang_thai = $_POST['ttdh'];
                bill_update($trang_thai,$_POST['id_bill']);
            }
            $list_bill = load_all_bills();
            include 'cart/list.php';
            break;
        case 'home':
            include 'home.php';
            break;
        /*------------------------ BÌNH LUẬN ---------------------- */
        case 'listbl':
            $list_bl = binh_luan_select_all_admin();
            include 'binhluan/list.php';
            break;
        case 'xoabl':
            if(isset($_GET['id_binh_luan'])&& ($_GET['id_binh_luan']>0)){
                $id_binh_luan = $_GET['id_binh_luan'];
                $xoa = binh_luan_delete($id_binh_luan);
                $thongbao ="Xóa thành công";
            } 
            $list_bl = binh_luan_select_all_admin();
            include 'binhluan/list.php';
            break;
    }
} else {
    include 'home.php';
}
