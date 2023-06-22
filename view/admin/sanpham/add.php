<div class="right">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Thêm mới sản phẩm</div>
                <?php
                if (isset($thongbao)) { ?>
                    <p class="alert alert-danger"><?= $thongbao ?></p>
                <?php
                }
                ?>
                <div class="card-body">
                    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data" id="add_hang_hoa">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Loại hàng</label>
                                <select name="id_danh_muc" class="form-control">
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        echo '<option value="' . $id_danh_muc . '">' . $ten_danh_muc . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="form-group col-sm-4">
                                <label class="form-label">Kích cỡ</label>
                                <select name="id_kich_co"  class="form-control">
                                    <?php
                                    foreach ($listkichco as $size) {
                                        extract($size);
                                        echo '<option value="' . $id_kich_co . '">' . $ten_kich_co . '</option>';
                                    }
                                    ?>
                                </select>
                            </div> -->
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
                                <select name="id_mau_sac" class="form-control">
                                    <?php
                                    foreach ($listmausac as $color) {
                                        extract($color);
                                        echo '<option value="' . $id_mau_sac . '">' . $ten_mau_sac . '</option>';
                                    }
                                    ?>
                                </select>
                            </div> -->

                        </div>
                        <div class="row my-3">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="ten_san_pham" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Ảnh sản phẩm</label>
                                <input type="file" multiple="multiple" name="anh" id="anh" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Hàng đặc biệt?</label>
                                <div class="form-control">
                                    <label class="radio-inline  mr-3">
                                        <input type="radio" value="1" name="dac_biet">Đặc biệt
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" name="dac_biet" checked>Bình thường
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Đơn giá (vnđ)</label>
                                <input type="number" name="gia" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Giảm giá (vnđ)</label>
                                <input type="number" name="giam_gia" class="form-control">
                            </div>
                             <div class="form-group col-sm-4 ">
                                <label class="form-label">Số lượng</label>
                                <input type="number" name="so_luong" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            
                            <!-- <div class="form-group col-sm-4">
                                <label class="form-label">Ngày nhập</label>
                                <input type="date" name="ngay_nhap" class="form-control">
                            </div> -->
                           
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Ảnh mô tả</label>
                                <input type="file" multiple="multiple" name="anhs[]" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Đặc điểm sản phẩm</label>
                                <textarea name="dac_diem" class="form-control form-control-lg mb-3" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Mô tả sản phẩm</label>
                                <textarea name="mo_ta" class="form-control form-control-lg mb-3" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="themmoi" value="Thêm mới" class="btn btn-primary mr-3">
                            <a href="index.php?act=listhh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>