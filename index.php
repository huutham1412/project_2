<?php
session_start();
ob_start();
include './models/danhmuc.php';
include './models/gioitinh.php';
include './models/sanpham.php';
include './models/taikhoan.php';
include './models/lienhe.php';
include './models/gioithieu.php';
include './models/mausac.php';
include './models/thongke.php';
include './models/tintuc.php';
include './models/binhluan.php';
include './models/cart.php';

include './view/client/header.php';

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

// Các sản phẩm nổi bật ở trang chủ
$nam = san_pham_select_dac_biet_nam();
$nu = san_pham_select_dac_biet_nu();
$te = san_pham_select_dac_biet_te();

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
            /*---------------------------LOAD SẢN PHẨM----------------------------- */
        case 'sanpham_nam':
           
            $danh_muc_nam = danh_muc_select_nam();
            $list_san_pham_nam = [];
            foreach ($danh_muc_nam as $value) {
                $nam_pro = san_pham_select_by_danh_muc($value['id_danh_muc']);
                foreach ($nam_pro as $item) {
                    array_push($list_san_pham_nam, $item);
                }
            }
            $count = count($list_san_pham_nam);
            $pop = 6;
            $so_trang = ceil($count/$pop);
            $list_san_pham_nam_by_page = array_slice($list_san_pham_nam,($_GET['trang']-1)*$pop,$pop);
            include './view/client/men.php';
            break;

        case 'sanpham_nu':
            $danh_muc_nu = danh_muc_select_nu();
            $list_san_pham_nu = [];
            foreach ($danh_muc_nu as $value) {
                $nu_pro = san_pham_select_by_danh_muc($value['id_danh_muc']);
                foreach ($nu_pro as $item) {
                    array_push($list_san_pham_nu, $item);
                }
            }
            $count = count($list_san_pham_nu);
            $pop = 6;
            $so_trang = ceil($count/$pop);
            $list_san_pham_nu_by_page = array_slice($list_san_pham_nu,($_GET['trang']-1)*$pop,$pop);
            include './view/client/women.php';
            break;

        case 'sanpham_te':
            $danh_muc_te = danh_muc_select_te();
            $list_san_pham_te = [];
            foreach ($danh_muc_te as $value) {
                $te_pro = san_pham_select_by_danh_muc($value['id_danh_muc']);
                foreach ($te_pro as $item) {
                    array_push($list_san_pham_te, $item);
                }
            }
            $count = count($list_san_pham_te);
            $pop = 6;
            $so_trang = ceil($count/$pop);
            $list_san_pham_te_by_page = array_slice($list_san_pham_te,($_GET['trang']-1)*$pop,$pop);
            include './view/client/child.php';
            break;
        case 'sanpham_tim_kiem':
            $kyw = $_POST['kyw'];
            $items = san_pham_select_keyword($kyw);
            include './view/client/products_search.php';
            break;
        case 'chitietsp':
            $id_san_pham = $_GET['id_san_pham'];
            $id_danh_muc = $_GET['id_danh_muc'];
            $san_pham = san_pham_select_by_id($id_san_pham);
            $anh_san_pham = san_pham_img_select_by_id($id_san_pham);
            $size_san_pham = san_pham_select_size($id_san_pham);
            $mau_san_pham = san_pham_select_mau($id_san_pham);

            $list = binh_luan_select_alls($id_san_pham);
            $cungloai = san_pham_cung_loai($id_danh_muc);
            include './view/client/single-product.php';
            break;
        case 'binhluan':
            if (isset($_POST['dang'])) {
                $noi_dung = $_POST['noi_dung'];
                $id_san_pham = $_POST['id_san_pham'];
                $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                $ngay_bl = date_format(date_create(), 'Y-m-d');
                binh_luan_insert($noi_dung, $ngay_bl, $id_tai_khoan, $id_san_pham);
                $list = binh_luan_select_alls($id_san_pham);
                header('location: index.php?act=chitietsp&id_san_pham=' . $id_san_pham . '&id_danh_muc=' . $id_danh_muc . '');
            }
            include './view/client/binhluan.php';
            break;
            /*---------------------------TIN TỨC----------------------------- */
        case 'tin_tuc':
            $list_tin_tuc = tin_tuc_select_all();
            include './view/client/news-list.php';
            break;
        case 'chitiet_tintuc':
            $id_tin_tuc = $_GET['id'];
            $tin_tuc = tin_tuc_select_by_id($id_tin_tuc);
            $images = tin_tuc_img_select_by_id($id_tin_tuc);
            
            include './view/client/single-news.php';
            break;
            /*---------------------------Giới thiệu----------------------------- */
        case 'about':
            $gioi_thieu = gioi_thieu_select_all();
            if (isset($_POST['lienhe'])) {
                $ho_ten  = $_POST['ho_ten'];
                $email = $_POST['email'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_bl = date_format(date_create(), 'Y-m-d');
                lien_he_insert($ho_ten, $email, $noi_dung, $ngay_bl);
                echo '<script language="javascript">alert("Cảm ơn bạn đã liên hệ với chúng tôi, chúng tôi sẽ sớm liện hệ lại với bạn!")</script>';
            }
            include './view/client/about.php';
            break;
            /*---------------------------LIÊN HỆ----------------------------- */
        case 'contact':
            if (isset($_POST['lienhe'])) {
                $ho_ten  = $_POST['ho_ten'];
                $email = $_POST['email'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_bl = date_format(date_create(), 'Y-m-d');
                lien_he_insert($ho_ten, $email, $noi_dung, $ngay_bl);
                echo '<script language="javascript">alert("Cảm ơn bạn đã liên hệ với chúng tôi, chúng tôi sẽ sớm liện hệ lại với bạn!")</script>';
            }
            include './view/client/contact.php';
            break;
            /*----------------------------------TÀI KHOẢN---------------------*/
        case 'login':
            if (isset($_POST['dangnhap'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $check_kh = tai_khoan_check($ten_dang_nhap, $mat_khau);
                if (is_array($check_kh)) {
                    $_SESSION['user'] = $check_kh;
                    header('location: index.php');
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng!!!";
                }
            }
            include './view/auth/login.php';
            break;
        case 'register':
            if (isset($_POST['dangky'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 3000000;
                $upload = true;
                $dir = "./uploaded/user/";
                $target_file = $dir . basename($img['name']);
                $ext = pathinfo($imgname, PATHINFO_EXTENSION);
                // bắt đầu bằng chữ in hoa, 6-32 kí tự,chữ, số, kí tự đb, dấu chấm
                $validate_mat_khau = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                //  gồm các chữ cái, số, gạch ngang, gạch dưới, từ 6-32 kí tự
                $validate_ten_dang_nhap = "/^[A-Za-z0-9_\.]{6,32}$/"; 
                $validate_email = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
                if (tai_khoan_exist($ten_dang_nhap)) {
                    $upload = false;
                    $thongbao = "Tên đăng nhập đã tồn tại";
                } else if (tai_khoan_exist_email($email)) {
                    $upload = false;
                    $thongbao = "Email này đã được đăng ký cho tài khoản khác";
                } else if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                    $upload = false;
                    $thongbao = "File không phải ảnh";
                } else if(!preg_match($validate_ten_dang_nhap ,$ten_dang_nhap, $matchs)){
                    $upload = false;
                    $thongbao = "Tên đăng nhập bạn vừa nhập không đúng định dạng";
                }
                else if(!preg_match($validate_mat_khau ,$mat_khau, $matchs)){
                    $upload = false;
                    $thongbao = "Mật khẩu bạn vừa nhập không đúng định dạng";
                }
                else if(!preg_match($validate_email ,$email, $matchs)){
                    $upload = false;
                    $thongbao = "Email bạn vừa nhập không đúng định dạng";
                }
                if ($upload != false) {
                    move_uploaded_file($img['tmp_name'], $target_file);
                    tai_khoan_insert($ten_dang_nhap, $mat_khau, $ho_ten, $email, $imgname, $vai_tro);
                    $thongbao = "Tạo thành công";
                    echo "<script>
                             alert('Tạo tài khoản thành công'); 
                        </script>";
                }
            }
            include './view/auth/register.php';
            break;
        case 'capnhat':
            if (isset($_POST['capnhat'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $hinh  = $_POST['anh'];
                $img = $_FILES['anh'];
                $imgname = $_FILES['anh']['name'];
                $maxSize = 8000000;
                $upload = true;
                $dir = "./uploaded/user/";
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
                    tai_khoan_update($ten_dang_nhap, $mat_khau, $ho_ten, $email, $hinh, $vai_tro);
                    $_SESSION['user'] = tai_khoan_check($ten_dang_nhap, $mat_khau);
                    $thongbao = "Sửa thành công";
                    echo "<script> alert('Sửa khoản thành công'); </script>";
                }
            }
            include './view/auth/update.php';
            break;
        case 'quenmatkhau':
            if (isset($_POST['quenmatkhau'])) {
                $email = $_POST['email'];
                $check_email = tai_khoan_check_email($email);
                if (is_array($check_email)) {
                    $thongbao = "Mật khẩu của bạn là: " . $check_email['mat_khau'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include './view/auth/forgot_pass.php';
            break;
        case 'doimatkhau':
            if (isset($_POST['doimatkhau'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau_cu = $_POST['mat_khau_cu'];
                $mat_khau = $_POST['mat_khau_moi'];

                if ($_SESSION['user']['mat_khau'] == $mat_khau_cu) {
                    tai_khoan_change_password($ten_dang_nhap, $mat_khau);
                    $thongbao = "Đổi mật khẩu thành công";
                } else {
                    $thongbao = "Mật khẩu cũ không đúng";
                }
            }
            include './view/auth/change_pass.php';
            break;
        case 'dangxuat':
            session_unset();
            header('location:index.php');
            ob_end_flush();
            break;
            /*---------------------------Giỏ hàng----------------------------- */
        case 'add_to_cart':
            if (isset($_POST['add_to_cart'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $ten_san_pham = $_POST['ten'];
                $anh = $_POST['anh'];
                $gia = $_POST['giam_gia'];
                $so_luong = $_POST['so_luong'];
                $size = $_POST['size'];
                $mau = $_POST['mau'];
                $i = 0;
                $count = 0;
                if (isset($_SESSION['mycart']) && (count($_SESSION['mycart']) > 0)) {
                    foreach ($_SESSION['mycart'] as $sp) {
                        if ($sp[0] == $id_san_pham && $sp[5] == $size && $sp[6] == $mau) {
                            $so_luong += $sp[4];
                            $count = 1;
                            $_SESSION['mycart'][$i][4] = $so_luong;
                            break;
                        }
                        $i++;
                    }
                }
                if ($count == 0) {
                    $spadd = [$id_san_pham, $ten_san_pham, $anh, $gia, $so_luong, $size, $mau];
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            
            include './view/cart/cart.php';
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                $index = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $index, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case 'delall':
            if (isset($_GET['idcart'])) {
                $index = $_GET['idcart'];
                unset($_SESSION['mycart'], $index);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case 'quantity_mod':
            if(isset($_POST['mod_quantity'])) {
                foreach($_SESSION['mycart'] as $key => $cart) {
                    if($cart[1] == $_POST['iname']) {
                        $_SESSION['mycart'][$key][4] = $_POST['mod_quantity'];
                    }
                }
            }
            header('location: index.php?act=viewcart');
            break;
        case 'bill':
            $thongbao = 'Bạn cần đăng nhập để tới phần đặt hàng';
            include './view/cart/bill.php';
            break;
        case 'billcomfirm':
            if (isset($_POST['dathang'])) {
                $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $pttt = $_POST['phuong_thuc_tt'];
                $dia_chi = $_POST['dia_chi'];
                $trang_thai = $_POST['trang_thai'];
                $ngay_dat_hang = date_format(date_create(), 'Y-m-d');
                $tong_don_hang = tong_don_hang();
                
                // insert vào bảng bill
                $id_bill = bill_insert($id_tai_khoan,$ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$tong_don_hang,$trang_thai);
               
                // insert vào bảng cart với session['mycart'] a $id_bill 
                foreach ($_SESSION['mycart'] as $cart) {
                    $ttien  = $cart[3] * $cart[4];
                    cart_insert($cart[1],$cart[3],$cart[4],$cart[5],$cart[6],$ttien,$id_bill,$_SESSION['user']['id_tai_khoan'],$cart[0]);
                    $so_luong_dtb = san_pham_select_so_luong($cart[0]);
                    $so_luong = $cart[4];
                    $con_lai = $so_luong_dtb['so_luong'] - $so_luong;
                    san_pham_update_so_luong($cart[0],$con_lai);
                }

                //xóa session cart
                $_SESSION['mycart'] = [];
            }
           
            $list_bill = loadone_bill($id_bill);
            include './view/cart/bill_comfirm.php';
            break;
        case 'mybill':
            $list_bill = load_all_bill($_SESSION['user']['id_tai_khoan']);
            include './view/cart/mybill.php';
            break;
        case 'chi_tiet_bill':
            $bill_by_id = bill_select_by_id($_GET['id_bill']);
            $cart_by_id = cart_select_by_id($_GET['id_bill']);
            include './view/cart/chi_tiet_mybill.php';
            break;
        case 'viewcart':
            include './view/cart/cart.php';
            break;
    }
} else {
    include './view/client/home.php';
}
include './view/client/footer.php';
