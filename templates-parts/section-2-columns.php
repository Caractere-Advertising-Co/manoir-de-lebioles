<?php 

$intro  = get_sub_field('intro-2-columns');
$imgG   = get_sub_field('img_gauche');
$imgD   = get_sub_field('img_droite');
$paraph = get_sub_field('paraph_droite');
$cta    = get_sub_field('cta-2-columns');

?>

<section id="section-two-columns">
    <div class="container content columns">
        <div class="colg">
            <?php if($intro): echo $intro; endif;?>
            <?php if($imgG): echo '<div class="block-img"><img src="'.$imgG['url'].'" alt="'.$imgG['title'].'"/></div>'; endif;?>
        </div>
        <div class="cold">
            <?php if($imgD): echo '<div class="block-img"><img src="'.$imgD['url'].'" alt="'.$imgD['title'].'"/></div>'; endif;?>
            <?php if($paraph): echo $paraph; endif;?>
            <?php if($cta):?>
                <a href="<?php echo $cta['url'];?>" class="cta"><?php echo $cta['title'];?></a>
            <?php endif;?>
        </div>
    </div>
</section>