<div class="right">
    <?php
    if (is_array($tk)) {
        extract($tk);
    }
    ?>
    <?php
    $img_path = "../../uploaded/images/" . $anh;
    if (is_file($img_path)) {
        $img = "<img src='$img_path' height='120'>";
    } else {
        $img = "no photo";
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Cập nhật khách hàng</div>
                <?php
                if (isset($thongbao)) { ?>
                    <p class="alert alert-danger"><?= $thongbao ?></p>
                <?php
                }
                ?>
                <div class="card-body">
                    <form action="index.php?act=upgt" method="POST" enctype="multipart/form-data" id="admin_update_kh">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" name="tieu_de" class="form-control" required value="<?= $tieu_de ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <label class="form-label">Ảnh</label>
                                        <input type="hidden" name="hinh" id="hinh" class="form-control" value="<?= $anh ?>">
                                        <input type="file" name="hinh" id="hinh" class="form-control">
                                    </div>
                                    <div class="col-sm-5">
                                        <?= $img ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Mô tả sản phẩm</label>
                                <textarea spellcheck="false" name="noi_dung" class="form-control form-control-lg mb-3" rows="8"><?= $noi_dung ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 text-center mt-3">
                            <input type="hidden" name="id_gioi_thieu" value="<?= $id_gioi_thieu ?>">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                            <a href="index.php?act=listgt"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>