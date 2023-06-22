<div class="right">
    <?php
    extract($tin);
    // extract($tin_img);
    ?>
    <?php
    $img_path = "../../uploaded/tintuc/" . $anh_chinh;
    if (is_file($img_path)) {
        $img = "<img src='$img_path' height='120'>";
    } else {
        $img = "no photo";
    }
    // $img_paths = "../uploaded/tintuc/" . $anh;
    // if (is_file($img_paths)) {
    //     $imgs = "<img src='$img_paths' height='120'>";
    // } else {
    //     $img = "no photo";
    // }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật tin tức</div>
                <?php
                if (isset($thongbao)) { ?>
                    <p class="alert alert-danger"><?= $thongbao ?></p>
                <?php
                }
                ?>
                <div class="card-body">
                    <form action="index.php?act=uptt" method="POST" enctype="multipart/form-data" id="admin_update_kh">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">Id tin tức</label>
                                <input type="text" name="id_tin_tuc" readonly class="form-control" required value="<?= $id_tin_tuc ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Tiêu đề</label>
                                <textarea name="tieu_de" class="form-control form-control-lg mb-3" rows="2"><?= $tieu_de ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Intro</label>
                                <textarea name="intro" class="form-control form-control-lg mb-3" rows="1"><?= $intro ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Nội dung 1</label>
                                <textarea name="noi_dung1" class="form-control form-control-lg mb-3" rows="1"><?= $noi_dung1 ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Nội dung 2</label>
                                <textarea name="noi_dung2" class="form-control form-control-lg mb-3" rows="1"><?= $noi_dung2 ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <label class="form-label">Ảnh</label>
                                        <input type="hidden" name="hinh" id="hinh" class="form-control" value="<?= $anh_chinh ?>">
                                        <input type="file" name="hinh" id="hinh" class="form-control">
                                    </div>
                                    <div class="col-sm-5">
                                        <?= $img ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <label class="form-label">Ảnh mô tả</label>
                                        
                                        <input type="file" name="hinhmt[]"  multiple="multiple" class="form-control">
                                    </div>
                                    <?php foreach ($tin_img as $key => $value) {?>
                                       <div class="col-sm-4">
                                            <img src="../../uploaded/tintuc/<?=$value['anh']?>" alt="" width="200">
                                    </div> 
                                    <?php }?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 text-center mt-3">
                            <input type="hidden" name="id_tin_tuc" value="<?= $id_tin_tuc ?>">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                            <a href="index.php?act=listkh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>