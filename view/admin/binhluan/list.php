<div class="right">
    <div class="card">
    <div class="card-header text-center bg-dark text-white text-uppercase py-4">Danh sách bình luận</div>
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">     
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Khách hàng BL</th>
                            <th>Tên sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th> 
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($list_bl as $item) {
                            extract($item);
                            $xoabl = "index.php?act=xoabl&id_binh_luan=" . $id_binh_luan;

                        ?>
                        <tr>
                            <td><?= $ten_dang_nhap?></td>
                            <td><?= $ten_san_pham ?></td>
                            <td><?= $noi_dung ?></td>
                            <td><?= $ngay_binh_luan ?></td>
                            <td class="text-end">
                                <a href="<?= $xoabl ?>"
                                    class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn có muốn xóa?')">Xóa<i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
                <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                <!-- -->
            </form>
        </div>
    </div>
</div>