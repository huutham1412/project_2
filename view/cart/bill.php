<?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
?>
    <h5 class="alert-secondary mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center text-sm-center text-md-center text-lg-center text-xl-center" style="margin-top: 5rem; margin-bottom: 0rem">Thông tin nhận hàng </h5>
    <div class="container tong">
        <form action="index.php?act=billcomfirm" class="form" method="POST">
            <div class="form-groups">
                <div class="left">
                    <label for="">Họ tên</label> <br>
                    <input type="text" name="ho_ten" id="" class="input" placeholder="" aria-describedby="helpId" value="<?= $ho_ten ?>">
                </div>
                <div class="right">
                    <label for="">Địa chỉ email</label><br>
                    <input type="text" name="email" id="" class="input" placeholder="" aria-describedby="helpId" value="<?= $email ?>">
                </div>

            </div>
            <div class="form-groups">
                <!-- <label for="">Tên đăng nhập</label> -->
                <input type="hidden" name="id_tai_khoan" id="" class="input" aria-describedby="helpId">
            </div>
            <div class="form-groups">
                <div class="left">
                    <label for="">Số điện thoại</label> <br>
                    <input type="text" name="sdt" id="" class="input" placeholder="" aria-describedby="helpId" required>
                </div>
                <div class="right">
                    <label for="">Địa chỉ nhận hàng</label> <br>
                    <input type="text" name="dia_chi" id="" class="input" placeholder="" aria-describedby="helpId" required>
                </div>

            </div>
            <div class="bottom">
                <label for="">Phương thức thanh toán </label>
                <br>
                <input type="radio" name="phuong_thuc_tt" id="" value="0" checked placeholder="" aria-describedby="helpId">
                Tiền mặt
                <input type="radio" name="phuong_thuc_tt" id="" value="1" placeholder="" aria-describedby="helpId"> Chuyển
                khoản ngân hàng
                <input type="radio" name="phuong_thuc_tt" id="" value="2" placeholder="" aria-describedby="helpId"> Ví điện
                tử
            </div>
            <input type="hidden" name="trang_thai" value="0">
            <!-- <div class="bottom">
                <label for="">Ghi chú</label> <br>
                <textarea name="ghi_chu" rows="5" cols="50" style="border-radius: 7px;"></textarea>
               
            </div> -->
            <div class="d-flex justify-content-center">
                <button type="submit" name="dathang" class="btn btn-success btn-block w-50">Xác
                    nhận</button>
            </div>
        </form>

        <div class="row m-1 pb-5">
            <table class="table table-responsive-md">
                <thead class="thead text-center">
                    <tr>
                        <th>Tên SP</th>
                        <th>Ảnh</th>
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
                    $i = 0;
                    foreach ($_SESSION['mycart'] as $cart) : ?>
                        <tr>
                            <?php
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                            ?>
                            <td><?= $cart[1] ?></td>
                            <td><img src="<?= './uploaded/images/' . $cart[2] ?>" . alt="" width="70" height="70"></td>
                            <td><span><?= $cart[3] ?></span>vnđ<input type="hidden" class="don_gia_an" name="don_gia" value="<?= $cart[3] ?>"></td>
                            <td><?= $cart[4] ?></td>
                            <td><?= $cart[5] ?></td>
                            <td><?= $cart[6]?></td>
                            <th><?= $ttien ?>vnđ</th>
                            <?php $i = $i + 1; ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot id="tongdonhang">
                    <tr class="text-center">
                        <th colspan="6">Tổng thành tiền: </th>
                        <td class="  text-danger font-weight-bold"><?= $tong ?>vnđ</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
<?php
} else {
?>
    <h4 class="alert alert-danger" style="text-align: center; margin-top:90px"><?= $thongbao ?></h4>
<?php }
?>