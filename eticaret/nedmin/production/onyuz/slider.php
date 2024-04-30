<?php
?>

<div class="main-slide">
    <div id="sync1" class="owl-carousel">
<?php
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();
while ($slider = $slidersor->fetch(PDO::FETCH_ASSOC)){

    ?>
        <div class="item">
            <div class="slide-desc">
                <div class="inner">
                    <h1><?php echo $slider['slider_ad'] ?></h1>
                    <p>
                        Sezonun en iyi ürünlerine en uygun fiyata sahip olmak için tıklayın                   </p>
                    <button class="btn btn-default btn-red btn-lg">Sepete Ekle!</button>
                </div>
                <div class="inner">
                    <div class="pro-pricetag big-deal">
                        <div class="inner">
                            <span class="oldprice">314tl</span>
                            <span>199tl</span>
                            <span class="ondeal">Şok İndirim!</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-type-1">
                <a href="<?php echo $slider['slider_link']?>">
                <img src="../dimg/slider/<?php echo $slider['slider_resimyol']?>" alt="" class="img-responsive"></a>
            </div>
        </div>
<?php }
?>
        </div>

</div>
