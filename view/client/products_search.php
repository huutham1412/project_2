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
                <h3 class="alert-secondary pt-3 pb-3 pl-sm-4 text-center "><?= count($items) == 0 ? 'Không có' : 'Các' ?> phẩm chứa từ khóa: <?= '"'.$kyw.'"'?></h3>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($items as $item) :?>
                <?php
                    extract($item);
                    $img_path = './uploaded/images/' . $anh;
                ?>
                <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <div class="col m-2 hidden">
                                            <form action="index.php?act=addtocart" method="POST">
                                                <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>">
                                                <input type="hidden" name="ten_san_pham" value="<?= $ten_san_pham ?>">
                                                <input type="hidden" name="anh" value="<?= $anh ?>">
                                                <input type="hidden" name="gia" value="<?= $gia ?>">
                                                <input type="hidden" name="giam_gia" value="<?= $giam_gia ?>">
                                                <input type="submit" name="add" value="Add to cart" class="btn btn-outline-success btn-sm " class="fa fa-shopping-cart">
                                            </form>
                                        </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="index.php?act=chitietsp&id_san_pham=<?php echo $id_san_pham ?>&id_danh_muc=<?= $id_danh_muc ?>">
                                    <img src="<?= './uploaded/images/' . $anh ?>" alt="" />
                                </a>
                            </div>
                            <div class="down-content">
                                <h4><?= $ten_san_pham ?></h4>
                                <del style="color:black"><?= $gia ?>VNĐ</del>
                                <span style="color:red;font-weight:600;font-size:23px"><?= $giam_gia ?>VNĐ</span>
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
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">></a>
                        </li>
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