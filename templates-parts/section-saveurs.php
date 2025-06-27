<?php 

$txt  = get_sub_field('titleSav');
$imgG = get_sub_field('imageSav-gauche');
$imgD = get_sub_field('imageSav-droite');

?>

<section id="saveurs-parallax">
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
        </div>
    </div>
</section>