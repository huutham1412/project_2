<div class="right">
    <div class="card">
    <div class="card-header text-center bg-dark text-white text-uppercase">Danh sách sản phẩm</div>
        <?php
        if (isset($thongbao)) { ?>
            <p class="alert alert-success"><?= $thongbao ?></p>
        <?php
        }
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="list_sp_tren my-3 mx-2">
                <a href="index.php?act=addsp" class="btn btn-success text-white">Thêm mới<i class="fas fa-plus-circle"></i></a>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 row" role="search" method="POST" action="index.php?act=list_search">
                    <input type="search" name="kyw" class="form-control col" placeholder="Search..." aria-label="Search">
                    <div class="col">
                        <button type="submit" name="timkiem" class="btn btn-secondary btn-number btn-custom">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <form action="index.php?act=listhh" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
                            <th>Đặc biệt?</th>
                            <th>Danh mục</th>
                            <th>Kích cỡ</th>
                            <th>Màu sắc</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listhh as $item) {
                            extract($item);
                            $suahh = "index.php?act=suasp&id_san_pham=" . $id_san_pham;
                            $xoahh = "index.php?act=xoasp&id_san_pham=" . $id_san_pham;
                            $img_path = "../../uploaded/images/" . $anh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='120' width='120' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                            $mau = san_pham_select_mau($id_san_pham);
                            $size = san_pham_select_size($id_san_pham);
                        ?>

                            <tr>

                                <td><?= $ten_san_pham ?></td>
                                <td><?= $img ?></td>
                                <td><?= $gia ?>VNĐ</td>
                                <td><i class="text-danger">(<?= $giam_gia ?>VNĐ)</i></td>
                                <td><?= $so_luong ?></td>
                                <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>
                                <td><?= $ten_danh_muc ?></td>
                                <td><?php foreach ($size as $key => $value) { ?>
                                        <?= $value['ten_kich_co'] . ', '  ?>
                                    <?php } ?>
                                </td>
                                <td><?php foreach ($mau as $key => $value) { ?>
                                        <?= $value['ten_mau_sac'] . ', '  ?>
                                    <?php } ?>
                                </td>


                                <td class="text-end">
                                    <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i>Sửa</a>
                                    <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fas fa-trash"></i>Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $trang; $i++) {
                    ?>
                        <li class="page-item"><a <?php if ($i == $page) {
                                echo  'style="background:gray;color:white"';
                                                    } else {
                                                        echo '';
                                                    } ?> class="page-link" href="index.php?act=listhh&trang=<?= $i ?>"><?= $i ?> </a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>