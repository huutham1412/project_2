<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <h3 class="title">Thay đổi mật khẩu</h3>
    </div>
    <?php
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);
            }
        ?>

    <!-- Login Form -->
    <form action="index.php?act=doimatkhau" method="POST">
      <?php
      if (isset($thongbao)) { ?>
        <p class="alert alert-danger"><?= $thongbao ?></p>
      <?php
      }
      ?>
      <input type="text" id="login" class="fadeIn second" name="mat_khau_cu" placeholder="Mật khẩu cũ">
      <input type="text" id="login" class="fadeIn second" name="mat_khau_moi" placeholder="Mật khẩu mới">
      <input type="hidden" value="<?= $ten_dang_nhap ?> " name="ten_dang_nhap">
      <input type="submit" class="fadeIn fourth" value="Submit" name="doimatkhau">
    </form>

  </div>
</div>