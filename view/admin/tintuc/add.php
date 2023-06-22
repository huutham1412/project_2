<div class="right">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase py-4">Thêm mới tin tức</div>
                <?php
                if (isset($thongbao)) { ?>
                    <p class="alert alert-danger"><?= $thongbao ?></p>
                <?php
                }
                ?>
                <div class="card-body">
                    <form action="index.php?act=addtt" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" name="tieu_de" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Ảnh chính</label>
                                <input type="file" name="hinh"  class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Ảnh mô tả</label>
                                <input type="file" name="hinhs[]" multiple="multiple"  class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Intro</label>
                                <textarea name="intro" class="form-control form-control-lg mb-3" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Nội dung 1</label>
                                <textarea name="noi_dung1" class="form-control form-control-lg mb-3" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="form-label">Nội dung 2</label>
                                <textarea name="noi_dung2" class="form-control form-control-lg mb-3" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 my-3 text-center">
                            <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                            <input type="submit" name="themmoi" value="Thêm mới" class="btn btn-primary mr-3">
                            <a href="index.php?act=listtt"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>