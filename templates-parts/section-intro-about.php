<?php

$miniature = get_sub_field('image-gauche');
$titleIntAbout = get_sub_field('titre-intro-about');
$introIntAbout = get_sub_field('intro-intro-about');
$imgD          = get_sub_field('image-intro-about');

/* Bottom */

$imgGFull       = get_sub_field('image-bottom-full');
$miniatureD     = get_sub_field('image-bottom-droite');
$paraphBottom   = get_sub_field('txt-bottom-droite');

?>

<section id="intro-about">
    <div class="container columns -top">
        <div class="colg">
            <div class="group-intro">
                <?php if($imgD):?>
                    <div class="block-img from-left">
                        <img src="<?php echo $imgD['url'];?>" alt="<?php echo $imgD['title'];?>"/>
                    </div>
                <?php endif;?>
                <div class="block-text from-bottom">
                    <?php if($titleIntAbout): echo $titleIntAbout;endif;?>
                </div>
            </div>
            <div class="block-intro from-bottom">
                <?php if($introIntAbout): echo $introIntAbout; endif;?>
            </div>
        </div>
        <div class="cold">
            <?php if($imgD):?>
                <div class="block-img from-right">
                    <img src="<?php echo $imgD['url'];?>" alt="<?php echo $imgD['title'];?>"/>
                </div>
            <?php endif;?>
        </div>
    </div>

    <div class="container columns -bottom">
        <div class="colg">
            <?php if($imgGFull):?>
                <div class="block-img from-left">
                    <img src="<?php echo $imgGFull['url'];?>" alt="<?php echo $imgGFull['title'];?>"/>
                </div>
            <?php endif;?>
        </div>
        <div class="cold from-right">
            <?php if($miniatureD):?>
                <div class="block-img rellax" data-rellax-speed="2">
                    <img src="<?php echo $miniatureD['url'];?>" alt="<?php echo $miniatureD['title'];?>"/>
                </div>
            <?php endif;?>

            <div class="block-intro">
                <?php if($paraphBottom): echo $paraphBottom; endif;?>
            </div>
        </div>
    </div>
</section>