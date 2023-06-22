<div class="right">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase py-4">danh sách loại hàng</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">

            <a href="index.php?act=adddm"><input type="submit" class="btn btn-success  my-3 mx-2" value="Nhập thêm"></a>
            <?php
            if (isset($thongbao)) { ?>
                <p class="alert alert-danger"><?= $thongbao ?></p>
            <?php
            }
            ?>
            <form action="index.php?act=listdm" method="post" class="table-responsive">

                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            extract($item);
                            $suadm = "index.php?act=suadm&id_danh_muc=" . $id_danh_muc;
                            $xoadm = "index.php?act=xoadm&id_danh_muc=" . $id_danh_muc;
                        ?>
                            <tr>
                                <td><?= $id_danh_muc ?></td>
                                <td><?= $ten_danh_muc ?></td>
                                <td class="text-end">
                                    <a href="<?= $suadm ?>" class="btn btn-outline-info btn-rounded">Sửa</a>
                                    <a href="<?= $xoadm ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');">Xóa</a>
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