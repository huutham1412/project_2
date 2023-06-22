<div class="right">
    <div class="page-title">
    <div class="card-header text-center bg-dark text-white text-uppercase py-4">Danh sách tin tức</div>
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">

        <a href="index.php?act=addtt" class="btn btn-success text-white mx-3 my-2">Thêm mới<i class="fas fa-plus-circle"></i></a>
            <form action="index.php?act=listtt" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Tin</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Intro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($list as $item) {
                            extract($item);
                            $suatt = "index.php?act=suatt&id_tin_tuc=" . $id_tin_tuc;
                            $xoatt = "index.php?act=xoatt&id_tin_tuc=" . $id_tin_tuc;
                            $img_path = "../../uploaded/tintuc/". $anh_chinh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='200' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                        ?>
                        <tr>
                            <td><?= $id_tin_tuc ?></td>
                            <td><?= $tieu_de ?></td>
                            <td><?= $img ?></td>
                            <td><?= $intro ?></td>
                            <td class="text-end">
                                <a href="<?= $suatt ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i>Sửa</a>
                                <a href="<?= $xoatt ?>" class="btn btn-outline-danger btn-rounded"
                                onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fas fa-trash"></i>Xóa</a>
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