<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <h1 class="title">Login</h1>
    </div>

    <!-- Login Form -->
    <form action="index.php?act=login" method="POST">
      <?php
      if (isset($thongbao)) { ?>
        <p class="alert alert-danger"><?= $thongbao ?></p>
      <?php
      }
      ?>
      <input type="text" id="login" class="fadeIn second" name="ten_dang_nhap" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="mat_khau" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="dangnhap">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="index.php?act=quenmatkhau">Forgot Password?</a>
      <div>
        <a class="underlineHover" href="index.php?act=register">You don't have an account?</a>
      </div>
    </div>

  </div>
</div>