<div class="right">
    <div class="card">

        <div class="card-header text-center bg-dark text-white text-uppercase py-4">Danh sách khách hàng</div>
    </div>
    <?php
    if (isset($thongbao)) { ?>
        <p class="alert alert-danger"><?= $thongbao ?></p>
    <?php
    }
    ?>
    <div class="box box-primary">
        <div class="box-body">
            <form action="index.php?act=listtk" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã KH</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh</th>
                            <th>Vai trò</th>
                            <th><a href="index.php?act=addtk" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listkh as $item) {
                            extract($item);
                            $suakh = "index.php?act=suatk&id_tai_khoan=" . $id_tai_khoan;
                            $xoakh = "index.php?act=xoatk&id_tai_khoan=" . $id_tai_khoan;
                            $img_path = "../../uploaded/user/" . $anh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='rounded-circle object-fit-cover'>";
                            } else {
                                $img = "no photo";
                            }

                        ?>
                            <tr>
                                <td><?= $id_tai_khoan ?></td>
                                <td><?= $ten_dang_nhap ?></td>
                                <td><?= $mat_khau ?></td>
                                <td><?= $ho_ten ?></td>
                                <td><?= $email ?></td>
                                <td><?= $img ?></td>
                                <td><?= ($vai_tro == 1) ? "Nhân viên" : "Khách hàng"; ?></td>

                                <td class="text-end">
                                    <a href="<?= $suakh ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i>Sửa</a>
                                    <a href="<?= $xoakh ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fas fa-trash"></i>Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>