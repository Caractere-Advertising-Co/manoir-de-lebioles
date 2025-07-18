<?php 

$txtEvents = get_field('titre-evenements','options');
$galEvents = get_field('galerie-evenement','options');
$ctaEvents = get_field('cta-evenement','options');
$tinyImg   = get_field('tiny-img-evenement','options');

?>

<section id="evenements">
    <div class="container columns content">
        <div class="colg">
            <div class="swiper swiper-events from-bottom">
                <div class="swiper-wrapper">
                    <?php if($galEvents):foreach($galEvents as $g):?>
                        <div class="swiper-slide block-img">
                            <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>"/>
                        </div>
                    <?php endforeach;endif;?>
                </div>
            </div>
            <div class="swiper-button-prev btnPrevEvents"></div>
            <div class="swiper-button-next btnNextEvents"></div>
            <?php if($tinyImg):?>
                <div class="blockDark from-bottom block-img">
                    <img src="<?php echo $tinyImg['url'];?>" alt="<?php echo $tinyImg['title'];?>" />
                </div>
            <?php endif;?>
        </div>
        <div class="cold from-right">
            <?php if($txtEvents): echo $txtEvents; endif;?>
            <?php if($ctaEvents):?>
                <a href="<?php echo $ctaEvents['url'];?>" class="cta from-right -slow"><?php echo $ctaEvents['title'];?></a>
            <?php endif;?>
        </div>
    </div>
</section>