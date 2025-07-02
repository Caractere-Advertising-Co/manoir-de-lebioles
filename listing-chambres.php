<?php 
/* Template Name: Listing Chambres */

$args = array(
    'post_type' => 'chambres',
    'posts_per_page'=> -1,
    'post_statut' => 'publish'
);

$query = new WP_Query( $args );


get_header();

get_template_part( 'templates-parts/section-hero');?>

<section id="listing-chambres">
    <div class="container columns content -col3">
        <?php if($query):

            $i = 0;
            while($query->have_posts()): $query->the_post();?>

            <?php if($i <= 2):
                $descr   = get_field('description-chambre');
                $galerie = get_field('galerie-chambre');
                $thmb    = $galerie[0]['url'];
                $thmbTitle = $galerie[0]['title'];?>

                <div class="card-rooms">
                    <a href="<?php echo get_the_permalink( );?>">
                        <div class="block-img">
                            <img src="<?php if($thmb): echo $thmb; endif?>" alt="<?php if($thmbTitle): echo $thmbTitle; endif?>" />
                        </div>  
                        <div class="titleRoom"><?php echo get_the_title();?></div>
                    </a>
                </div>
            <?php endif; $i++; endwhile;
        endif;?>
    </div>

    <div class="container columns content -col2">
        <?php if($query):
        $i = 0;
            while($query->have_posts()): $query->the_post();
                if($i >= 3):
                    $descr   = get_field('description-chambre');
                    $galerie = get_field('galerie-chambre');
                    $thmb    = $galerie[0]['url'];
                    $thmbTitle = $galerie[0]['title'];?>

                    <div class="card-rooms">
                        <a href="<?php echo get_the_permalink( );?>">
                            <div class="block-img">
                                <img src="<?php if($thmb): echo $thmb; endif?>" alt="<?php if($thmbTitle): echo $thmbTitle; endif?>" />
                            </div>  
                            <div class="titleRoom"><?php echo get_the_title();?></div>
                        </a>
                    </div>
                <?php endif;
            $i++; endwhile;
        endif;?>
    </div>
</section>  

<?php

get_template_part( 'templates-parts/builder/section-prestations');
get_template_part( 'templates-parts/builder/section-citation' );
get_template_part( 'templates-parts/fullwidth-banner' );

// FAQ
get_template_part( 'templates-parts/section-faq' );
get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');
get_footer();
?>