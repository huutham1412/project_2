<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Đơn
    hàng của tôi</h5>

<div class="container">
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng mặt hàng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
            <?php 
                foreach ($list_bill as $bill){
                        extract($bill);
                        $ttdh = get_ttdh($bill['trang_thai_don_hang']);
                        $count = count_cart($bill['id_bill']);
                        $ct = "index.php?act=chi_tiet_bill&id_bill=" . $id_bill;
                    echo '
                    <tr>
                        <td>DAM-'.$bill['id_bill'].'</td>
                        <td>'.$bill['ngay_dat_hang'].'</td>
                        <td>'.$count.'</td>
                        <td>'.currency_format($bill['total']).'</td>
                        <td>'.$ttdh.'</td>
                        <td><a href="'. $ct.'" class="btn btn-outline-info btn-rounded">Chi tiết</a></td>
                    </tr>
                    ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>