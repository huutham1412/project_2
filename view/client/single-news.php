<div class="container">
    <?php extract($tin_tuc); 
        extract($images); 
    ?>
    <div class="single-news-wrapper">
        <div class="titles"><?= $tieu_de ?></div>
        <h4 class="intro"> <?= $intro ?></h4>
        <div>
            <div class="text"><?=$noi_dung1 ?></div>
            <img src="./uploaded/tintuc/<?= $images[0]['anh'] ?>" alt="">
        </div>
        <div>
        <div class="text"><?=$noi_dung2 ?></div>
            <img src="./uploaded/tintuc/<?= $images[1]['anh'] ?>" alt="">
        </div>
    </div>
</div>