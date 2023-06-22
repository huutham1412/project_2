<main>
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                <h2>Tin tức mới nhất</h2>
                <!-- <span>Nổ lực không ngừng</span> -->
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container"> 
        <div class="news-wrapper">
            <?php foreach ($list_tin_tuc as $item): ?>
                <?php extract($item); ?>
                <div class="row mt-4 news-item">
                    <div class="col-lg-4">
                        <a href="index.php?act=chitiet_tintuc&id=<?=$id_tin_tuc ?>"><img src="./uploaded/tintuc/<?= $anh_chinh?>" class="news-img" alt=""></a>
                    </div>
                    <div class="col-lg-8">
                        <a href="index.php?act=chitiet_tintuc&id=<?=$id_tin_tuc ?>"><h2 class="news-title"><?= $tieu_de?></h2></a>
                        <p class="news-intro"><?= $intro?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>