<div class="right">
    
    <?php
    if (is_array($dm)) {
        extract($dm);
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Sửa danh mục</div>
                <div class="card-body">
                    <form action="index.php?act=updm" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Mã danh mục</label>
                            <input type="text" name="id_danh_muc" class="form-control" value="<?= $id_danh_muc ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục</label>
                            <input type="text" name="ten_danh_muc" class="form-control" required value="<?php if (isset($ten_danh_muc) && ($ten_danh_muc != "")) echo $ten_danh_muc; ?>">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id_danh_muc" value="<?php if (isset($id_danh_muc) && ($id_danh_muc != "")) echo $id_danh_muc; ?>">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                            <a href="index.php?act=listdm"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>