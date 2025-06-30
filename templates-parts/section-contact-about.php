<?php

$imgG       = get_sub_field('img-g-about-contact');
$miniatureD = get_sub_field('mini-d-about-contact');
$txtContact = get_sub_field('txt-about-contact');
$ctaContact = get_sub_field('cta-about-contact');

?>

<section id="section-contact-about">
    <div class="container columns">
        <div class="colg">
            <?php if($imgG):?>
                <div class="block-img">
                    <img src="<?php echo $imgG['url'];?>" alt="<?php echo $imgG['title'];?>"/>
                </div>
            <?php endif;?>
        </div>
        <div class="cold">
            <?php if($miniatureD):?>
                <div class="block-img rellax" data-rellax-speed="1">
                    <img src="<?php echo $miniatureD['url'];?>" alt="<?php echo $miniatureD['title'];?>"/>
                </div>
            <?php endif;?>

            <?php if($txtContact): echo $txtContact; endif;?>
            <?php if($ctaContact):?>
                <a href="<?php echo $ctaContact['url'];?>" class="cta"><?php echo $ctaContact['title'];?></a>
            <?php endif;?>
        </div>
    </div>
</section>