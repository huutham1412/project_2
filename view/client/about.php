<?php
foreach ($gioi_thieu as $key => $row) : {
?>
    ?>
    <div class="page-heading about-page-heading" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <h2>Công ty của chúng tôi</h2>
              <span>Nổ lực không ngừng</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="left-image">
              <img src="<?= './uploaded/images/' . $row['anh'] ?> ?>" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-content">
              <h4><?= $row['tieu_de'] ?></h4>
              <div class="quote">
                <i class="fa fa-quote-left"></i>
                <p>
                  Nếu mọi người không cười vào mục tiêu của bạn, điều đó có nghĩa là mục tiêu của bạn quá nhỏ
                </p>
              </div>
              <p>
                <?= $row['noi_dung'] ?>
              </p>
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-behance"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
<?php endforeach ?>
<!-- ***** About Area Ends ***** -->

<!-- ***** Our Team Area Starts ***** -->
<section class="our-team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Our Amazing Team</h2>
          <span>Details to details is what makes Hexashop different from the
            other themes.</span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="team-item">
          <div class="thumb">
            <div class="hover-effect">
              <div class="inner-content">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <img src="view/assets/images/team-member-01.jpg" />
          </div>
          <div class="down-content">
            <h4>Ragnar Lodbrok</h4>
            <span>Product Caretaker</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="team-item">
          <div class="thumb">
            <div class="hover-effect">
              <div class="inner-content">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <img src="view/assets/images/team-member-02.jpg" />
          </div>
          <div class="down-content">
            <h4>Ragnar Lodbrok</h4>
            <span>Product Caretaker</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="team-item">
          <div class="thumb">
            <div class="hover-effect">
              <div class="inner-content">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <img src="view/assets/images/team-member-03.jpg" />
          </div>
          <div class="down-content">
            <h4>Ragnar Lodbrok</h4>
            <span>Product Caretaker</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Our Team Area Ends ***** -->

<!-- ***** Services Area Starts ***** -->
<!-- <section class="our-services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Our Services</h2>
          <span>Details to details is what makes Hexashop different from the
            other themes.</span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="service-item">
          <h4>Synther Vaporware</h4>
          <p>
            Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed
            do eiusmod temp incididunt ut labore, et dolore quis ipsum
            suspend.
          </p>
          <img src="view/assets/images/service-01.jpg" alt="" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="service-item">
          <h4>Locavore Squidward</h4>
          <p>
            Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed
            do eiusmod temp incididunt ut labore, et dolore quis ipsum
            suspend.
          </p>
          <img src="view/assets/images/service-02.jpg" alt="" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="service-item">
          <h4>Health Gothfam</h4>
          <p>
            Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed
            do eiusmod temp incididunt ut labore, et dolore quis ipsum
            suspend.
          </p>
          <img src="view/assets/images/service-03.jpg" alt="" />
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- ***** Services Area Ends ***** -->

<!-- ***** Subscribe Area Starts ***** -->
<div class="subscribe">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="section-heading">
          <h2>ĐĂNG KÝ THÔNG TIN ĐỂ NHẬN NHỮNG CHƯƠNG TRÌNH ƯU ĐÃI LỚN.</h2>
          <span>“Đặt sự hài lòng của khách hàng là ưu tiên số 1 trong mọi suy nghĩ hành động của mình” là sứ mệnh, là
            triết lý, chiến lược.. luôn cùng YODY tiến bước.</span>
        </div>
        <form id="contact" action="index.php?act=contact" method="post">
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <input name="ho_ten" type="text" id="name" placeholder="Your name" required="">
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <input name="email" type="text" id="email" placeholder="Your email" required="">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <textarea name="noi_dung" rows="6" cols="114" id="message" placeholder="Your message" required=""></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" name="lienhe" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
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
<!-- ***** Subscribe Area Ends ***** -->

<!-- ***** Footer Start ***** -->