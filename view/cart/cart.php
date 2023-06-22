<div class="container wrapper px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
           <!-- <form action="index.php?act=bill" method="POST"> -->
              <div class="table-responsive">
                  <table class="table table-bordered m-0">
                      <thead>
                          <tr>
                              <!-- Set columns width -->
                              <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                              <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                              <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                              <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                              <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $tong = 0;
                          $i = 0;
                          foreach ($_SESSION['mycart'] as $cart) : ?>
                          <?php 
                            $amount = san_pham_select_so_luong($cart[0]);
                            if($amount['so_luong'] == $cart[4]){
                                echo "<script> alert('Sản phẩm ".$cart[1]." chỉ có tối đa: ".$amount['so_luong']." sản phẩm'); </script>";
                            }
                          ?>
                              <tr>
                                  <!-- <?php
                                  $ttien = number_format($cart[3]) * number_format($cart[4]);
                                  $tong += $ttien;
                                  ?> -->
                                  <td class="p-4">
                                      <div class="media align-items-center">
                                          <img src="<?= './uploaded/images/' . $cart[2] ?>" style="width: 70px; height: 70px;" class="d-block ui-bordered mr-4" alt="">
                                          <div class="media-body">
                                              <b href="#" class="d-block text-dark"><?= $cart[1] ?></b>
                                              <small>
                                                  <span class="text-muted">Color: <?= $cart[6] ?></span>
                                                  <!-- <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp; -->
                                                  <span class="text-muted">Size: <?= $cart[5] ?></span> ;
                                                  <!-- <span class="text-muted">Ships from: </span> Hà Nội -->
                                              </small>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="text-right font-weight-semibold align-middle p-4"><?= $cart[3] ?>VNĐ <input type="hidden" class="iprice" value="<?= $cart[3] ?>"></td>
                                  <td class="text-right font-weight-semibold align-middle p-4">
                                    <form action="index.php?act=quantity_mod" method="POST">
                                      <input type="hidden" value="<?= $cart[1]?>" name="iname" >
                                      <div class="number-input">
                                        <button type="submit" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                        <input name='mod_quantity' class="iquantity" onchange="this.form.submit()" type="number" min="1" max="<?= $amount['so_luong'] ?>" value="<?= $cart[4] ?>">
                                        <button type="submit" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                      </div>
                                      <!-- <input onchange="this.form.submit()" name='mod_quantity' class="iquantity" type="number" min="1" max="10" class="form-control text-center" value="<?= $cart[4] ?>"> -->
                                    </form>
                                  </td>
                                  <td class="text-right font-weight-semibold align-middle p-4">
                                    <div class="wrap-itotal"><span class="itotal"></span><span>VNĐ</span></div>
                                  </td>
                                  <!-- <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td> -->
                                  <td class="pt-1 pt-4">
                                      <a onclick="return confirm('Bạn chắc chắn muốn xóa?');" href="index.php?act=delcart&idcart=<?= $i ?>" class="btn btn-outline-danger"> <i class="fas fa-trash-alt "></i></a>
                                  </td>
                                  <?php $i = $i + 1; ?>
                              </tr>
                          <?php endforeach ?>
                      <tfoot id="tongdonhang">
                          <tr class="text-center">
                              <th colspan="3">Tổng thành tiền: </th>
                              <td class="">
                                <span class="text-danger font-weight-bold gtotal"></span>
                                <span class="">VNĐ</span>
                              </td>
                              <td></td>
                          </tr>
                          <tr class="text-right">
                              <th colspan="5">
                                  <a onclick="return confirm('Bạn chắc chắn muốn xóa tất cả k??');" href="index.php?act=delall" class="btn btn-danger">Xóa tất cả</a>
                              </th>
                          </tr>
                      </tfoot>
                      </tbody>
                  </table>
              </div>
              <div class="float-right wrap-checkout">
                  <a href="index.php"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
                  <a href="index.php?act=bill"><button type="submit" class="btn btn-lg btn-primary mt-2">Checkout</button></a>
              </div>
           <!-- </form> -->
        </div>
    </div>
</div>
</div>
<script src="./view/assets/js/app.js"></script>
      