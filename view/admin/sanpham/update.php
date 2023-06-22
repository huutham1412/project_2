<?php
if (is_array($hh)) {
    extract($hh);
}
?>
<?php
$img_path = "../../uploaded/images/" . $anh;
if (is_file($img_path)) {
    $img = "<img src='" . $img_path . "' height='60'>";
} else {
    $img = "no photo";
}
?>
<div class="right">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hàng hóa</div>
                <div class="card-body">
                    <form action="index.php?act=upsp" method="POST" enctype="multipart/form-data" id="update_hang_hoa">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Danh mục</label>
                                <select name="id_danh_muc" class="form-control" id="ma_loai">
                                    <?php

                                    foreach ($listdm as $loai_hang) {
                                        extract($loai_hang);
                                        if ($id_danh_muc == $hang_hoa_info['id_danh_muc']) $s = "selected";
                                        else $s = "";
                                        echo '<option value="' . $id_danh_muc . '" ' . $s . '>' . $ten_danh_muc . '</option>';
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label checkbox">Kích cỡ</label> <br>
                                    <?php
                                    foreach ($listkichco as $size) {
                                        extract($size);
                                        echo '<input name="id_kich_co[]" type="checkbox" value="' . $id_kich_co . '">' .$ten_kich_co .' | ' ;
                                    }
                                    ?>
                              
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Màu sắc</label> <br>
                                    <?php
                                    foreach ($listmausac as $color) {
                                        extract($color);
                                        echo '<input name="id_mau_sac[]"  type="checkbox" value="' . $id_mau_sac . '">' .$ten_mau_sac .' | ' ;
                                    }
                                    ?>
                              
                            </div>
                            <!-- <div class="form-group col-sm-4">
                                <label class="form-label">Màu sắc</label>
                                <select name="id_mau_sac" class="form-control" id="id_mau_sac">
                                    <?php

                                    foreach ($listmausac as $mau) {
                                        extract($mau);
                                        if ($id_mau_sac == $hang_hoa_info['id_mau_sac']) $s = "selected";
                                        else $s = "";
                                        echo '<option value="' . $id_mau_sac . '" ' . $s . '>' . $ten_mau_sac . '</option>';
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Kích cỡ</label>
                                <select name="id_kich_co" class="form-control" id="id_kich_co">
                                    <?php

                                    foreach ($listkichco as $size) {
                                        extract($size);
                                        if ($id_kich_co == $hang_hoa_info['id_kich_co']) $s = "selected";
                                        else $s = "";
                                        echo '<option value="' . $id_kich_co . '" ' . $s . '>' . $ten_kich_co . '</option>';
                                    }

                                    ?>

                                </select>
                            </div> -->
                        </div>
                        <div class="row my-3">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="ten_san_pham" class="form-control" required value="<?= $ten_san_pham ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Mã sản phẩm</label>
                                <input type="text" name="id_san_pham" readonly class="form-control" value="<?= $id_san_pham ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Số lượng</label>
                                <input type="number" name="so_luong" class="form-control" value="<?= $so_luong ?>">
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-sm-4">
                                <label>Hàng đặc biệt?</label>
                                <div class="form-control">
                                    <label class="radio-inline  mr-3">
                                        <input type="radio" value="1" name="dac_biet" <?= $dac_biet ? 'checked' : '' ?>>Đặc
                                        biệt
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" name="dac_biet" <?= !$dac_biet ? 'checked' : '' ?>>Bình thường
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Đơn giá (VNĐ)</label>
                                <input type="text" name="gia" class="form-control" value="<?= $gia ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Giảm giá (VNĐ)</label>
                                <input type="text" name="giam_gia" class="form-control" required value="<?= $giam_gia ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <div class="row align-items-center">
                                    <div class="col-sm-8">
                                        <label class="form-label">Ảnh sản phẩm</label>
                                        <input type="hidden" name="anh" class="form-control" value="<?= $anh ?>">
                                        <input type="file" name="anh" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- Ảnh sản phẩm ban đầu -->
                                        <?= $img ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <label class="form-label">Ảnh mô tả</label>
                                        
                                        <input type="file" name="anhmt[]"  multiple="multiple" class="form-control">
                                    </div>
                                    <?php foreach ($hh_img as $key => $value) {?>
                                       <div class="col-sm-4">
                                            <img src="../../uploaded/images/<?=$value['anh']?>" alt="" width="150">
                                    </div> 
                                    <?php }?>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Đặc điểm sản phẩm</label>
                                <textarea spellcheck="false" name="dac_diem" class="form-control form-control-lg mb-3" rows="5"><?= $dac_diem ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-12">
                                <label class="form-label">Mô tả sản phẩm</label>
                                <textarea spellcheck="false" name="mo_ta" class="form-control form-control-lg mb-3" rows="5"><?= $mo_ta ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                            <a href="index.php?act=listhh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>