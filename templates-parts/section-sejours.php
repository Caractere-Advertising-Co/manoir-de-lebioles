<?php

$TitreSejour = get_field('titre_sejour','options');
$descSejour  = get_field('desc_sejour','options');

?>

<section id="sejours">
    <?php if(!is_front_page(  )):?> 
        <div class="container columns">
            <div class="colg"><?php if($TitreSejour): echo $TitreSejour; endif;?></div>
            <div class="cold"><?php if($descSejour): echo $descSejour; endif;?></div>
        </div>
    <?php endif;?>

    <div class="container grid block-sejour">
        <?php if(have_rows('sejours','options')):
            $i = 0;
            while(have_rows('sejours','options')): the_row('sejours','options');
            
            $bg = get_sub_field('background');
            $titre = get_sub_field('titre_sejour');
            $lien = get_sub_field('lien');?>
            
            <div class="col from-bottom <?php echo $i != 0 ? '-slow' : '';?>">
                <a href="<?php echo $lien['url'];?>">
                    <div class="block-img">
                        <img src="<?php echo $bg['url'];?>" alt="<?php echo $bg['title'];?>"/>
                    </div>
                <h4><?php echo $titre;?></h4>
                <span  class="cta-line"><?php echo $lien['title'];?></span></a>
            </div>
            <?php $i++; endwhile;
        endif;?>
    </div>
</section>