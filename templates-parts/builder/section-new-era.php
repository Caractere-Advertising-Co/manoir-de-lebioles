<?php 

$intro  = get_sub_field('text_newera');
$imgG   = get_sub_field('img_newera');

?>

<section id="section-new-era">
    <div class="container content columns">
        <div class="colg">
            <?php if($imgG): echo '<div class="block-img from-left"><img src="'.$imgG['url'].'" alt="'.$imgG['title'].'"/></div>'; endif;?>
        </div>
        <div class="cold from-right">
            <?php if($intro): echo $intro; endif;?>
        </div>
    </div>
</section>