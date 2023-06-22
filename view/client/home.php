<div class="main-banner" id="top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="left-content">
          <div class="thumb">
            <div class="inner-content">
              <h4>HEXA FASHION</h4>
              <span>LOOK GOOD &amp; FEEL GOOD!</span>
              <div class="main-border-button">

              </div>
            </div>
            <img src="view/assets/images/left-banner-image.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-content">
          <div class="row">
            <div class="col-lg-6">
              <div class="right-first-image">
                <div class="thumb">
                  <div class="inner-content">
                    <h4>Women</h4>
                    <span>Thời Trang Dành Cho Nữ</span>
                  </div>
                  <div class="hover-content">
                    <div class="inner">
                      <h4>NỮ GIỚI</h4>
                      <p>Thời trang quý phái, sắc sảo thiết kế dành cho phái đẹp!</p>
                      <div class="main-border-button">
                        <a href="index.php?act=sanpham_nu">Discover More</a>
                      </div>
                    </div>
                  </div>
                  <img src="view/assets/images/baner-right-image-01.jpg" />
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-first-image">
                <div class="thumb">
                  <div class="inner-content">
                    <h4>Men</h4>
                    <span>Thời Trang Dành Cho Nam</span>
                  </div>
                  <div class="hover-content">
                    <div class="inner">
                      <h4>NAM GIỚI</h4>
                      <p>Đa dạng phong cảnh điển trai cùng thời trang dành cho phái mạnh.</p>
                      <div class="main-border-button">
                        <a href="index.php?act=sanpham_nam">Discover More</a>
                      </div>
                    </div>
                  </div>
                  <img src="view/assets/images/baner-right-image-02.jpg" />
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-first-image">
                <div class="thumb">
                  <div class="inner-content">
                    <h4>Kids</h4>
                    <span>Thời Trang Dành Cho Trẻ Em</span>
                  </div>
                  <div class="hover-content">
                    <div class="inner">
                      <h4>TRẺ EM</h4>
                      <p>An toàn cho bé - Ba mẹ yên tâm.</p>
                      <div class="main-border-button">
                        <a href="index.php?act=sanpham_te">Discover More</a>
                      </div>
                    </div>
                  </div>
                  <img src="view/assets/images/baner-right-image-03.jpg" />
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-first-image">
                <div class="thumb">
                  <div class="inner-content">
                    <h4>Accessories</h4>
                    <span>Phụ Kiện Thời Trang</span>
                  </div>
                  <div class="hover-content">
                    <div class="inner">
                      <h4>PHỤ KIỆN</h4>
                      <p>
                        Phụ kiện độc lạ nhằm dẫn đầu trend. Tạo nên vẻ đẹp của 1 fashionista đích thực.
                      </p>
                      <div class="main-border-button">
                        <a href="#">Discover More</a>
                      </div>
                    </div>
                  </div>
                  <img src="view/assets/images/baner-right-image-04.jpg" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Thời trang nam tại Hexa</h2>
          <span>THĂNG HẠNG PHONG CÁCH - NÂNG TẦM PHONG THÁI.</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="men-item-carousel">
          <div class="owl-men-item owl-carousel">

            <?= require 'products_men.php' ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->
<section class="section" id="women">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>thời trang nữ tại hexa</h2>
          <span>THANH LỊCH, SẮC XẢO - CHÌA KHÓA MẶC ĐẸP CHO PHỤ NỮ.</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="women-item-carousel">
          <div class="owl-women-item owl-carousel">
            <?= include 'products_women.php' ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section" id="kids">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>thời trang trẻ em tại hexa</h2>
          <span>THỜI TRANG Ở NHÀ CÙNG BÉ VUI CHƠI THOẢI MÁI.</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="kid-item-carousel">
          <div class="owl-kid-item owl-carousel">

            <?= require 'products_child.php' ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<!-- <section class="section" id="explore">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="left-content">
          <h2>Explore Our Products</h2>
          <span>You are allowed to use this HexaShop HTML CSS template. You can
            feel free to modify or edit this layout. You can convert this
            template as any kind of ecommerce CMS theme as you wish.</span>
          <div class="quote">
            <i class="fa fa-quote-left"></i>
            <p>
              You are not allowed to redistribute this template ZIP file on
              any other website.
            </p>
          </div>
          <p>
            There are 5 pages included in this HexaShop Template and we are
            providing it to you for absolutely free of charge at our
            TemplateMo website. There are web development costs for us.
          </p>
          <p>
            If this template is beneficial for your website or business,
            please kindly
            <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a>
            a little via PayPal. Please also tell your friends about our
            great website. Thank you.
          </p>
          <div class="main-border-button">
            <a href="products.php">Discover More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-content">
          <div class="row">
            <div class="col-lg-6">
              <div class="leather">
                <h4>Leather Bags</h4>
                <span>Latest Collection</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="first-image">
                <img src="view/assets/images/explore-image-01.jpg" alt="" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="second-image">
                <img src="view/assets/images/explore-image-02.jpg" alt="" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="types">
                <h4>Different Types</h4>
                <span>Over 304 Products</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- ***** Explore Area Ends ***** -->

<!-- ***** Social Area Starts ***** -->
<section class="section" id="social">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Tin tức</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row images">
      <?php $list_tin_tuc = tin_tuc_select_alls(); ?>
      <?php foreach ($list_tin_tuc as $item) : ?>
        <?php extract($item); ?>
        <div class="col-2">
          <div class="thumb">
            <div class="icon">
              <a href="index.php?act=chitiet_tintuc&id=<?= $id_tin_tuc ?>">
                <p style="color: white; font-size:17px; font-weight:600;font-family:Verdana, Geneva, Tahoma, sans-serif"><?= $tieu_de ?></p>
              </a>
            </div>
            <a href="index.php?act=chitiet_tintuc&id=<?= $id_tin_tuc ?>"><img src="./uploaded/tintuc/<?= $anh_chinh ?>"alt=""></a>
          </div>
        </div>
      <?php endforeach; ?>
     
    </div>
  </div>
</section>
<!-- ***** Social Area Ends ***** -->

<!-- ***** Subscribe Area Starts ***** -->
<div class="subscribe">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="section-heading">
          <h2>Chúng tôi luôn hướng tới sự hài lòng của khách hàng, đặt chất lượng cửa sản phẩm lên hàng đầu.</h2>
          <span>“Đặt sự hài lòng của khách hàng là ưu tiên số 1 trong mọi suy nghĩ hành động của mình” là sứ mệnh, là
            triết lý, chiến lược.. luôn cùng YODY tiến bước.</span>
        </div>
        <!-- <form id="subscribe" action="" method="get">
          <div class="row">
            <div class="col-lg-5">
              <fieldset>
                <input name="name" type="text" id="name" placeholder="Your Name" required="" />
              </fieldset>
            </div>
            <div class="col-lg-5">
              <fieldset>
                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="" />
              </fieldset>
            </div>
            <div class="col-lg-2">
              <fieldset>
                <button type="submit" id="form-submit" class="main-dark-button">
                  <i class="fa fa-paper-plane"></i>
                </button>
              </fieldset>
            </div>
          </div>
        </form> -->
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-6">
            <ul>
              <li>Store Location:<br><span>6 Trịnh Văn Bô, Xuân Phương, Quận Nam Từ Liêm, Hà Nội.</span></li>
              <li>Phone:<br><span>010-020-0340</span></li>
              <li>Office Location:<br><span>FPOLYTECHNIC, KHU NHÀ P, P402.</span></li>
            </ul>
          </div>
          <div class="col-6">
            <ul>
              <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
              <li>Email:<br><span>yodyfpt@company.com</span></li>
              <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>,
                  <a href="#">Linkedin</a></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>