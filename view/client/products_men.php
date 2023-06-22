<?php foreach ($nam as $item) :
    extract($item);
    $img_path = './uploaded/images/' . $anh;
?>
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
            <del style="color:black"><?= currency_format($gia) ?></del>
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
<?php endforeach; ?>