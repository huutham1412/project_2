<?php
session_start();
$id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
$id_san_pham = $_REQUEST['id_san_pham'];

$list = binh_luan_select_alls($id_san_pham);
    include '../../models/binhluan.php';
?>
 <?php
    if (isset($_POST['dang'])) {
        $noi_dung = $_POST['noi_dung'];
        $id_san_pham = $_POST['id_san_pham'];
        $id_tai_khoan = $_POST['id_tai_khoan'];
        $ngay_bl = date_format(date_create(), 'Y-m-d');
        $upload = true;
        if($noi_dung == ""){
            $upload = false;
            var_dump($noi_dung);
        }  
        if ($upload){
                binh_luan_insert($noi_dung, $ngay_bl, $id_tai_khoan, $id_san_pham);
                header("Location:" . $_SERVER['HTTP_REFERER']);
        }else {
            $thongbao = "Bạn cần nhập nội dung trước khi gửi";
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <div class="col-12" id="reviews">
        <div class="card border-light mb-3">
            <div class="container card-header bg-primary text-white text-uppercase text-center"><i class="fa fa-comment"></i> Đánh giá
            </div>
            <div class="card-body">
                <?php foreach ($list as $bl) : ?>
                    <div style="margin:25px 0px;border-bottom:2px solid #cdcdcd;display:grid; grid-template-columns:5% 25% 60% 10%;">
                        <img width="60" height="60" class="rounded-circle object-fit-cover" src="<?= './uploaded/user/' . $bl['anh'] ?>" />
                        <b><?php echo 'họ tên: ' . $bl['ten_dang_nhap'] ?></b>
                        <p><?php echo $bl['noi_dung'] ?></p>
                        <span style="float:right;font-size:20px"><?php echo $bl['ngay_binh_luan'] ?></span>
                    </div>
                <?php endforeach ?>
            </div>


            <?php
            if (!isset($_SESSION['user'])) {
                echo '<h5 class="text-center"><i class="text-danger">Đăng nhập để bình luận về sản phẩm này</i></h5>';
            } else {
            ?>
                <div class="comment-box text-center">
                    <h4>Để lại bình luận</h4>
                    <?= $thongbao ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="comment-area">
                            <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                            <input type="hidden" name="id_tai_khoan" value="<?= $id_tai_khoan ?>">
                            <textarea name="noi_dung" placeholder="Nội dung..." rows="4" cols="110"></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success send px-5" name="dang">Đăng bình luận
                            <i class="fa-thin fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php
            } ?>

           
        </div>
    </div>
</body>

</html>