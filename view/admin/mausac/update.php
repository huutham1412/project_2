<?php
if (is_array($ms)) {
    extract($ms);
}
?>
<div class="right">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Sửa màu sắc</div>
                <div class="card-body">
                    <form action="index.php?act=upms" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Mã màu sắc</label>
                            <input type="text" name="id_mau_sac" class="form-control" value="<?= $id_mau_sac ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên màu săc</label>
                            <input type="text" name="ten_mau_sac" class="form-control" required value="<?php if (isset($ten_mau_sac) && ($ten_mau_sac != "")) echo $ten_mau_sac; ?>">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id_mau_sac" value="<?php if (isset($id_mau_sac) && ($id_mau_sac != "")) echo $id_mau_sac; ?>">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                            <a href="index.php?act=listms"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>