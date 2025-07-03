<?php 

$type = get_sub_field('select_posttype-grid');
$titleDiscover = get_sub_field('titleDiscover');

?>

<section id="section-discover">
    <div class="container content">
        <?php if($titleDiscover): echo $titleDiscover; endif;?>
    </div>
    <div class="container content">
        <?php if($type):?>

            <div class="swiper swiper-discover">
                <div class="swiper-wrapper">
                    <?php foreach($type as $t):

                        $descr   = $t['description-chambre'];
                        $galerie = $t['galerie-chambre'];
                        $thmb    = $galerie[0]['url'];
                    ?>
                        <div class="swiper-slide">
                            <div class="block-img"><img src="<?php echo $thmb;?>" /></div>
                            <?php echo '<h3>'.get_the_title().'</h3>';?>
                            <?php echo '<p>'. substr($descr,0,170). '...</p>';?>
                            <a href="<?php echo get_the_permalink()?>" class="cta-line">EXPLORER</a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>

            <div class="swiper-button-prev discoverBtnPrev"></div>
            <div class="swiper-button-next discoverBtnNext"></div>
       <?php endif;?>
    </div>
</section>
  