<div class="right">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase py-4">danh sách các loại màu</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">

            <!-- <a href="index.php?act=addms"><input type="submit" class="btn btn-success mb-1" value="Nhập thêm"></a>   -->
            <a href="index.php?act=addms" class="btn btn-success text-white my-3 mx-2">Thêm mới<i class="fas fa-plus-circle"></i></a>
            <?php
            if (isset($thongbao)) { ?>
                <p class="alert alert-danger"><?= $thongbao ?></p>
            <?php
            }
            ?>
            <form action="index.php?act=listms" method="post" class="table-responsive">

                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã màu sắc</th>
                            <th>Tên màu sắc</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            extract($item);
                            $suams = "index.php?act=suams&id_mau_sac=" . $id_mau_sac;
                            $xoams = "index.php?act=xoams&id_mau_sac=" . $id_mau_sac;
                        ?>
                            <tr>
                                <td><?= $id_mau_sac ?></td>
                                <td><?= $ten_mau_sac ?></td>
                                <td class="text-end">
                                    <a href="<?= $suams ?>" class="btn btn-outline-info btn-rounded">Sửa</a>
                                    <a href="<?= $xoams ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');">Xóa</a>
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