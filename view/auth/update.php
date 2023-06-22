<div class="right">
    <div class="card-header text-center bg-dark text-white text-uppercase"style="margin-top: 80px!important; padding:10px 0;">Cập nhật tài khoản</div>
    <div class="row m-1 pb-5">
        <?php
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);
            }
        ?>
        <div class="col-lg-6 col-md p-6">
            <img src="<?= './uploaded/user/'.$anh ?>"  alt=""width="500px" class="object-fit-cover">
        </div>
        <div class="col-lg-6 col-md" style="text-align: left;">
            <form action="index.php?act=capnhat" method="POST" enctype="multipart/form-data"
                id="update_tk">

                <div class="form-group">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="ten_dang_nhap" id="" class="form-control" value="<?= $ten_dang_nhap ?>" readonly
                        aria-describedby="helpId" style="width:450px!important;margin:0!important">
                </div>
                <div class="form-group form">
                    <label for="">Họ và tên</label>
                    <input type="text" name="ho_ten" id="" class="form-control" value="<?= $ho_ten ?>"
                        aria-describedby="helpId" style="width:450px!important;margin:0!important">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" name="email" id="" class="form-control" value="<?= $email ?>"
                        aria-describedby="helpId" style="width:450px!important;margin:0!important">
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="anh" id="" class="form-control" aria-describedby="helpId" style="width:400px!important">
                </div>
                <div class="form-group pl-2">
                    <i class=" text-danger"><?= (isset($thongbao) && (strlen($thongbao) > 0)) ? $thongbao : "" ?></i>
                </div>

                <input name="vai_tro" value="<?= $vai_tro ?>" type="hidden">
                <input name="mat_khau" value="<?= $mat_khau ?>" type="hidden">
                <input name="anh" value="<?= $anh ?>" type="hidden">
                <div class="form-group">
                    <button type="submit" name="capnhat" class="btn btn-info btn-block pt-2 pb-2">Cập
                        nhật</button>
                </div>
            </form>
        </div>


    </div>
</div>