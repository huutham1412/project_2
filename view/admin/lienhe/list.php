<div class="right">
    <div class="card">
        
    <div class="card-header text-center bg-dark text-white text-uppercase py-4">Danh sách khách hàng liên hệ</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <?php
            if (isset($thongbao)) { ?>
                <p class="alert alert-danger"><?= $thongbao ?></p>
            <?php
            }
            ?>
            <form action="index.php?act=listlh" method="post" class="table-responsive">

                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            extract($item);
                            $xoadm = "index.php?act=xoalh&id_lien_he=" . $id_lien_he;
                        ?>
                            <tr>
                                <td><?= $ho_ten ?></td>
                                <td><?= $email ?></td>
                                <td><?= $noi_dung ?></td>
                                <td><?= $ngay_lien_he ?></td>
                                <td class="text-end">
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
