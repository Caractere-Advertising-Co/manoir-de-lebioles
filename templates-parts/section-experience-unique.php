<?php 

$txtExpUnique = get_sub_field('titre-exp-unique');
$galExpUnique = get_sub_field('galerie-exp-unique');
$ctaExpUnique = get_sub_field('cta-exp-unique');
$backExpUnique = get_sub_field('background');

?>

<section id="experience-uniques">
    <?php if($backExpUnique):?>
        <div class="block-img background">
            <img src="<?php echo $backExpUnique['url'];?>" alt=""/>   
        </div>
    <?php endif;?>
    <div class="container columns content">
        <div class="colg">
            <?php if($txtExpUnique): echo $txtExpUnique; endif;?>
            <?php if($ctaExpUnique):?>
                <a href="<?php echo $ctaExpUnique['url'];?>" class="cta from-right -slow"><?php echo $ctaExpUnique['title'];?></a>
            <?php endif;?>
        </div>
        <div class="cold from-right">
            <div class="swiper swiper-events from-bottom">
                <div class="swiper-wrapper">
                    <?php if($galExpUnique):foreach($galExpUnique as $g):?>
                        <div class="swiper-slide block-img">
                            <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>"/>
                        </div>
                    <?php endforeach;endif;?>
                </div>
            </div>
            <div class="swiper-button-prev btnPrevEvents"></div>
            <div class="swiper-button-next btnNextEvents"></div>
            <div class="blockDark from-bottom"></div>
        </div>
    </div>
</section>