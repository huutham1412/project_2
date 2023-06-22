<div class="col-12" id="reviews">
    <div class="card border-light mb-3">
        <div class="card-header bg-secondary text-white text-uppercase text-center container" ><i class="fa fa-comment"></i> Bình luận
        </div>
        <?php
            extract($list);
        ?>
        <div class="card-body container">
                <?php foreach ($list as $bl) : ?>
                    <div style="margin:25px 0px;border-bottom:2px solid #cdcdcd;display:grid; grid-template-columns:5% 25% 60% 10%;">
                    <img width="60" height="60" class="rounded-circle object-fit-cover"
                    src="<?= './uploaded/user/'. $bl['anh'] ?>" />
					<b><?php echo'họ tên: '.$bl['ten_dang_nhap']?></b>
                    <p style="font-size: 25px;"><?php echo $bl['noi_dung'] ?></p>
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
            <form action="index.php?act=binhluan" method="POST">
                <div class="comment-area">
                    <input type="hidden" name="id_san_pham" value="<?= $id_san_pham?>">
                    <input type="text" name="noi_dung" id="">
                </div>
                <div class="text-center mt-4">
                <button type="submit" class="btn btn-success send px-5" name="dang">Đăng 
                        <i class="fa fa-paper-plane mx-1 py-1"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php
        } ?>
    </div>
</div>