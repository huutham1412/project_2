<!-- <h1 class="alert alert-danger">Chào mừng bạn đến với trang Admin</h1> -->
<div class="right">
    <div class="tongs">
        <div class="tren ">
            <div class="one shadow-lg p-3 mb-5 bg-body">
                <h4>Doanh thu</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                                <?php
                                $san_pham_da_giao = thong_ke_select_by_giao_xong();
                                $doanh_thu = 0;
                                foreach ($san_pham_da_giao as $key => $value) {
                                    $doanh_thu += $value['total'];
                                }
                                echo '' . currency_format($doanh_thu) . ' vnđ';
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="one shadow-lg p-3 mb-5 bg-body">
                <h4>Số sản phẩm</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                            <?= $count_san_pham['dem'].' sản phẩm'?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="one shadow-lg p-3 mb-5 bg-body">
                <h4>Số tài khoản</h4>
                <div class="detail">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                        </li>
                        <li>
                            <div class="gia-tri">
                                <?= $count_tai_khoan['dem'].' tài khoản'?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="h4 py-3 mx-4">Top 5 sản phẩm bán chạy</div>
        <div class="row m-1 pb-5">
            <table class="table table-responsive-md border " id="customers">
                <thead class="thead text-center">
                    <tr>

                        <th>Tên sản phẩm</th>
                        <th>Số lượng đã bán</th>
                        <th>Giá </th>
                        <th>Tổng số</th>

                    </tr>
                </thead>
                <tbody class="text-center" id="giohang">
                    <?php
                    foreach ($ban_chay as $thongke) {
                        extract($thongke);
                        $tong = $sl * $gia;
                        echo '
                    <tr>
                      
                        <td>' . $ten . '</td>
                        <td>' . $sl . '</td>
                        <td>' . currency_format($gia) . ' </td>
                        <td>' . currency_format($tong) . ' </td>
                     
                    </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="h4 py-3 mx-4">Thống kê đơn hàng</div>
        <div class="row m-1 pb-5">
            <table class="table table-responsive-md border " >
                <thead class="thead text-center">
                    <tr>
                        <th></th>
                        <th>Đơn hàng mới</th>
                        <th>Đang xử lý</th>
                        <th>Đang giao</th>
                        <th>Đã giao xong</th>

                    </tr>
                </thead>
                <tbody class="text-center" id="giohang">
                     <tr>
                        <th>Số lượng</th>
                        <td><?= $don_hang_moi['dem'] ?></td>
                        <td> <?= $dxl['dem'] ?></td>
                        <td><?= $dg['dem'] ?></td>
                        <td> <?= $dx['dem'] ?></td>
                    
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td><?=currency_format($don_hang_moi['tong'] ) ?></td>
                        <td> <?=currency_format($dxl['tong'])?></td>
                        <td><?=currency_format($dg['tong'])  ?></td>
                        <td> <?=currency_format($dx['tong'])  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="h4 py-3 mx-4">Thống kê sản phẩm theo danh mục</div>
        <div class="row m-1 pb-5">
            <table class="table table-responsive-md border " id="customers">
                <thead class="thead text-center">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="giohang">
                    <?php
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        echo '
                    <tr>
                        <td>' . $maloai . '</td>
                        <td>' . $tenloai . '</td>
                        <td>' . $countsp . '</td>
                        <td>' . currency_format($maxgia) . ' </td>
                        <td>' . currency_format($mingia) . ' </td>
                        <td>' . currency_format($tb) . '</td>
                    </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="h4 py-3 mx-4">Biểu đồ tổng quan về sản phẩm</div>
        <div id="piechart" style="width:100%; height:500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng sản phẩm'],
                    <?php
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        echo "
            ['" . $thongke['tenloai'] . "'," . $thongke['countsp'] . "],
        ";
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Thống kê sản phẩm theo danh mục'
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>

    </div>