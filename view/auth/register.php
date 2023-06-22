<div class="wrapper fadeInDown my-5">
  <div id="formContent">
    <div class="fadeIn first">
      <h1 class="title">Register</h1>
    </div>


    <form action="index.php?act=register" method="POST" enctype="multipart/form-data">
      <?php
      if (isset($thongbao)) { ?>
        <p class="alert alert-danger"><?= $thongbao ?></p>
      <?php
      }
      ?>
      <input type="text"  class="fadeIn second" name="ho_ten" placeholder="Họ tên">
      <input type="text"  class="fadeIn second" name="ten_dang_nhap" placeholder="Tên đăng nhập">
      <input type="password" id="password"  class="fadeIn third" name="mat_khau" placeholder="Mật khẩu">
      <input type="text"  class="fadeIn second" name="email" placeholder="Email">
      <input type="file"  class="fadeIn second" name="anh" >
      <input type="hidden" name="vai_tro" value="0">
      
      <input type="submit" class="fadeIn fourth" value="Đăng ký" name="dangky">
      <input type="reset" class="fadeIn fourth" value="Nhập lại">
    </form>


    <div id="formFooter">
      <a class="underlineHover" href="index.php?act=login">You have an account?</a>
    </div>

  </div>
</div>
