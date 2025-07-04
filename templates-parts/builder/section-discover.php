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
                    <?php foreach($type as $post):
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post);

                        if($post->post_type == 'page' || $post->post_type == 'sejours'):
                            $galerie = get_field('galerie-hero');

                            if(empty($galerie)):
                                $galerie = get_field('galerie-hero','options');
                            endif;
                                $thmb    = $galerie[0]['hero']['url'];
                        elseif($post->post_type == 'chambres'):
                            $galerie = get_field('galerie-chambre');
                            $thmb    = $galerie[0]['url'];
                        endif;

                    ?>
                        <div class="swiper-slide">
                            <div class="block-img"><img src="<?php echo $thmb;?>" /></div>
                            <?php echo '<h3>'.get_the_title().'</h3>';?>
                            <a href="<?php echo get_the_permalink()?>" class="cta-line">EXPLORER</a>
                        </div>

                        <?php wp_reset_postdata();?>
                    <?php endforeach;?>
                </div>
            </div>

            <div class="swiper-button-prev discoverBtnPrev"></div>
            <div class="swiper-button-next discoverBtnNext"></div>
       <?php endif;?>
    </div>
</section>
  