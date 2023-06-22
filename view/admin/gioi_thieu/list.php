<div class="right">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase py-4">Bài viết giới thiệu</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <?php
            if (isset($thongbao)) { ?>
                <p class="alert alert-danger"><?= $thongbao ?></p>
            <?php
            }
            ?>
            <form action="index.php?act=listgt" method="post" class="table-responsive">

                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            extract($item);
                            $suagt = "index.php?act=suagt&id_gioi_thieu=" . $id_gioi_thieu;
                            $img_path = "../../uploaded/images/" . $anh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='130' width='130' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                        ?>
                            <tr>
                                <td><?= $tieu_de ?></td>
                                <td><?= $img ?></td>
                                <!--  -->
                                <td class="text-end">
                                    <a href="<?= $suagt ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i>Sửa</a>
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