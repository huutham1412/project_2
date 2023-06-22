<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <h3 class="title">Nhập email để lấy lại mật khẩu</h3>
    </div>

    <!-- Login Form -->
    <form action="index.php?act=quenmatkhau" method="POST">
      <?php
      if (isset($thongbao)) { ?>
        <p class="alert alert-danger"><?= $thongbao ?></p>
      <?php
      }
      ?>
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
      <input type="submit" class="fadeIn fourth" value="Submit" name="quenmatkhau">
    </form>

  </div>
</div>