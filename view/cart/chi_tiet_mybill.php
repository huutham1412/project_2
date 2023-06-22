<div class="right tong pt-5 container" style="margin-top: 50px;">
    <form action="index.php?act=update_bill" class="form" method="POST">
        <div class="form-groups">
            <div class="left">
                <label for="">Họ tên</label> <br>
                <input type="text" name="ho_ten" class="input" aria-describedby="helpId" value="<?= $bill_by_id['ho_ten'] ?>" readonly>
            </div>
            <div class="right">
                <label for="">Địa chỉ email</label><br>
                <input type="text" name="email" id="" class="input" placeholder="" readonly aria-describedby="helpId" value="<?= $bill_by_id['email'] ?>">
            </div>

        </div>
        <div class="form-groups">
            <!-- <label for="">Tên đăng nhập</label> -->
            <input type="hidden" name="id_tai_khoan" id="" class="input" aria-describedby="helpId">
        </div>
        <div class="form-groups">
            <div class="left">
                <label for="">Số điện thoại</label> <br>
                <input type="text" name="sdt" id="" class="input" placeholder="" readonly aria-describedby="helpId" value="<?= $bill_by_id['sdt'] ?>" required>
            </div>
            <div class="right">
                <label for="">Địa chỉ nhận hàng</label> <br>
                <input type="text" name="dia_chi" id="" class="input" placeholder="" readonly aria-describedby="helpId" value="<?= $bill_by_id['dia_chi'] ?>" required>
            </div>
</div>
    </form>

    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Tên SP</th>
                    <th>Đơn giá</th>
                    <th style="width:6rem">Số lượng</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
                <?php
                $tong = 0;
                foreach ($cart_by_id as $cart) : ?>
                    <?php
                        $ttien = $cart['so_luong'] * $cart['gia'];
                        $tong += $ttien;
                    ?>
                    <tr>
                        <td><?= $cart['ten'] ?></td>
                        <td><span><?=currency_format($cart['gia'])  ?></span></td>
                        <td><?= $cart['so_luong'] ?></td>
                        <td><?= $cart['size'] ?></td>
                        <td><?= $cart['mau'] ?></td>
                        <th><?=currency_format($cart['thanh_tien'])  ?></th>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot id="tongdonhang">
                    <tr class="text-center">
                        <th colspan="5">Tổng thành tiền: </th>
                        <td class="  text-danger font-weight-bold"><?=currency_format($tong)  ?></td>
                    </tr>
                </tfoot>

        </table>
    </div>
</div>