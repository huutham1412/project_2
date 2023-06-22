<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Chất lượng - Niềm tin</h2>
                    <span>Chúng tôi luôn hướng tới những sản phẩm tốt nhất đến với tay của khách hàng!</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Sản phẩm cho nam giới</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($list_san_pham_te_by_page as $item) : ?>
                <?php
                extract($item);
                $img_path = './uploaded/images/' . $anh;
                ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>"><i class="fa fa-star"></i></a></li>
                                    <li><a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>">
                                <img src="<?= './uploaded/images/' . $anh ?>" alt="" />
                            </a>
                        </div>
                        <div class="down-content">
                            <h4><?= $ten_san_pham ?></h4>
                            <del style="color:black"><?=currency_format($gia)  ?></del>
                            <span style="color:red;font-weight:600;font-size:23px"><?=currency_format($giam_gia)  ?></span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        <?php for($i = 0; $i<$so_trang; $i++) { ?>
                            <?php 
                                $trang = isset($_GET['trang']) ? $_GET['trang'] : 1 
?>
                            <li class="<?= $i+1 == $trang ? 'active' : '' ?>">
                                <a  href="index.php?act=sanpham_te&trang=<?= $i+1?>"><?= $i+1?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Products Area Ends ***** -->

<!-- ***** Footer Start ***** -->
<!-- <?php include_once 'footer.php'; ?> -->

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