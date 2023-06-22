<div class="right">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Thêm mới khách hàng</div>
                <?php
                if (isset($thongbao)) { ?>
                    <p class="alert alert-danger"><?= $thongbao ?></p>
                <?php
                }
                ?>
                <div class="card-body">
                    <form action="index.php?act=addtk" method="POST" enctype="multipart/form-data" id="admin_add_kh">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">Tên đăng nhập</label>
                                <input type="text" name="ten_dang_nhap" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="ho_ten" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" name="mat_khau" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="mat_khau2" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label">Ảnh</label>
                                <input type="file" name="anh" id="anh" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Địa chỉ email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Vai trò?</label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="vai_tro">Khách hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="vai_tro" checked>Nhân viên
                                </label>
                            </div>
                        </div>
                </div>

                <div class="mb-3 text-center mt-3">
                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                    <input type="submit" name="themmoi" value="Thêm mới" class="btn btn-primary mr-3">
                    <a href="index.php?act=listtk"><input type="button" class="btn btn-success" value="Danh sách"></a>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>