<div class="right">
    <div class="card">
        <div class="card-header text-center bg-dark text-white text-uppercase py-4">Quản lý đơn hàng</div>
    </div>
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Họ tên</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng mặt hàng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
                <?php
                foreach ($list_bill as $bill) {
                    extract($bill);
                    $ttdh = get_ttdh($bill['trang_thai_don_hang']);
                    $count = count_cart($bill['id_bill']);
                    $suadm = "index.php?act=sua_bill&id_bill=" . $id_bill;
                    $xoadm = "index.php?act=xoa_cart&id_bill=" . $id_bill;

                ?>
                    <tr>
                        <td>DA1-<?= $bill['id_bill'] ?></td>
                        <td><?= $bill['ho_ten'] ?></td>
                        <td><?= $bill['ngay_dat_hang'] ?></td>
                        <td><?= $count ?></td>
                        <td><?=currency_format($bill['total'])  ?></td>
                        <td><?= $ttdh ?></td>

                        <td class="text-end">
                            <a href="<?= $suadm ?>" class="btn btn-outline-info btn-rounded">Chi tiết</a>
                            <!-- <a href="<?= $xoadm ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');">Xóa</a> -->
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</div>