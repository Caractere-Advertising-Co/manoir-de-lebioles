<?php 

$type = get_sub_field('select_posttype-grid');

$args = array(
    'post_type' => 'chambres',
    'posts_per_page'=> -1,
    'post_statut' => 'publish'
);

$query = new WP_Query( $args );

$titleDiscover = get_field('titleDiscover','options');

?>

<section id="section-discover">
    <div class="container content">
        <?php if($titleDiscover): echo $titleDiscover; endif;?>
    </div>
    <div class="container content">
        <?php if($query):?>

            <div class="swiper swiper-discover">
                <div class="swiper-wrapper">
                    <?php while($query->have_posts()): $query->the_post();

                        $descr   = get_field('description-chambre');
                        $galerie = get_field('galerie-chambre');
                        $thmb    = $galerie[0]['url'];
                    ?>
                        <div class="swiper-slide">
                            <div class="block-img"><img src="<?php echo $thmb;?>" /></div>
                            <?php echo '<h3>'.get_the_title().'</h3>';?>
                            <?php echo '<p>'. substr($descr,0,170). '...</p>';?>
                            <a href="<?php echo get_the_permalink()?>" class="cta-line">EXPLORER</a>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>

            <div class="swiper-button-prev discoverBtnPrev"></div>
            <div class="swiper-button-next discoverBtnNext"></div>
       <?php endif;?>
    </div>
</section>
  