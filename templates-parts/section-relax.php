<?php 

$txt    = get_sub_field('titleRelax');
$imgG   = get_sub_field('imageRelax-gauche');
$imgD   = get_sub_field('imageRelax-droite');
$paraph = get_sub_field('texteRelax-droite');

$backExpUnique = get_sub_field('background');

?>

<section id="relax-parallax">
    <?php if($backExpUnique):?>
        <div class="block-img background">
            <img src="<?php echo $backExpUnique['url'];?>" alt="<?php echo $backExpUnique['title'];?>"/>   
        </div>
    <?php endif;?>
    <div class="container columns content">
        <div class="colg">
            <?php if($txt): echo $txt;endif;?>
            <?php if($imgG):?>
                <div class="block-img rellax" data-rellax-speed="2">
                    <img src="<?php echo $imgG['url'];?>" alt="<?php echo $imgG['title'];?>"/>
                </div>
            <?php endif;?>
        </div>
        <div class="cold">
            <?php if($imgD):?>
                <div class="block-img rellax" data-rellax-speed="-2">
                    <img src="<?php echo $imgD['url'];?>" alt="<?php echo $imgD['title'];?>"/>
                </div>
            <?php endif;?>
            <?php if($paraph): echo '<div class="rellax" data-rellax-speed="-2">'.$paraph.'</div>'; endif;?>
        </div>
    </div>
</section>