  <?php extract($san_pham); ?>

  <body>
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <h2>Chi tiết sản phẩm</h2>
              <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="left-images">
              <div class="row">
                <div class="col-lg-3">
                  <?php foreach ($anh_san_pham as $item) : ?>
                    <div class="col-lg-12"><img src="./uploaded/images/<?= $item['anh'] ?>" /></div>
                  <?php endforeach; ?>
                </div>
                <div class="col-lg-9">
                  <img src="./uploaded/images/<?= $anh ?>" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="right-content">
              <h4><?= $ten_san_pham ?></h4>
              <div class="price">
                <del class="text-black"><?=currency_format($gia)  ?>VNĐ</del>
                <div class="text-danger"><?=currency_format($giam_gia) ?></div>
              </div>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span><?= $dac_diem ?></span>
              <div class="quote">
                <i class="fa fa-quote-left"></i>
                <p>
                  <?= $mo_ta ?>
                </p>
              </div>
              <?php
                  $so_luong_trong_cart = 0;
                  if(isset($_SESSION['mycart'])){
                    foreach ($_SESSION['mycart'] as $key => $value) {
                      if($value[0] == $_GET['id_san_pham']){
                          $so_luong_trong_cart = $value[4];
                      }
                    }
                  }
                  if ($so_luong >0 && $so_luong_trong_cart < $so_luong) {
                ?>
              <div class="order-content">
                <div class="left-content">
                  <h6>Quantity</h6>
                  <h6>Size</h6>
                  <h6>Color</h6>
                </div>
                
                <div class="right-content">
                  <form action="index.php?act=add_to_cart" method="POST">
                    <div class="number-input">
                      <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                      <input name='so_luong' class="" type="number" min="1" max="<?= $so_luong - $so_luong_trong_cart ?>" required>
                      <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                    </div>
                    <!-- <input type="number" min="1" max="20" name="so_luong" class="input qty"> -->
                    <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                    <input type="hidden" name="ten" value="<?= $ten_san_pham ?>">
                    <input type="hidden" name="giam_gia" value="<?= $giam_gia ?>">
                    <input type="hidden" name="anh" value="<?= $anh ?>">
                    <div class="size">
                      <?php foreach ($size_san_pham as $item) : ?>
                        <div>
                          <span class="name"><?= $item['ten_kich_co'] ?></span>
                          <input type="radio" name="size" value="<?= $item['ten_kich_co'] ?>" required>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="color">
                      <?php foreach ($mau_san_pham as $item) : ?>
                        <div>
                          <span class="<?= $item['ten_mau_sac'] ?>"></span>
                          <input type="radio" name="mau" value="<?= $item['ten_mau_sac'] ?>" required>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <input type="submit" name="add_to_cart" class="btn-add-to-cart" value="Add To Cart">
                  </form>
                <?php
                  } else{
                ?>
                  <button class="mx-5 my-3 btn btn-danger w-75" style="height:75px; font-size:20px">Sản phẩm đã hết hàng</button>
                <?php
                  }
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="row" id="binhluan">
    <?php include 'binhluan.php'; ?>
    </div>
    <!------- SẢN PHẨM CÙNG LOẠI ------->
    <div class="row">
      <?php include 'cungloai.php'; ?>
    </div>

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/quantity.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

    <script>
      $(function() {
        var selectedClass = "";
        $("p").click(function() {
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(50, 0.1);
          $("#portfolio div")
            .not("." + selectedClass)
            .fadeOut();
          setTimeout(function() {
            $("." + selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
          }, 500);
        });
      });
    </script>
  </body>