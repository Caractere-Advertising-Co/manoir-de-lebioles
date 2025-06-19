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
    <div class="container columns content">
        <?php if($query):

            $i = 0;
            while($query->have_posts()): $query->the_post();?>

            <?php if($i <= 2):?>
                <div class="card-rooms">
                    <?php echo get_the_title();?>
                </div>
            <?php endif; $i++; endwhile;
        endif;?>
    </div>

    <div class="container columns content">
        <?php if($query):
        $i = 0;
            while($query->have_posts()): $query->the_post();?>
             <?php if($i >= 3):?>
            <div class="card-rooms">
                    <?php echo get_the_title();?>
                </div>
            <?php endif;?>

            <?php $i++; endwhile;
        endif;?>
    </div>
</section>  

<?php

get_template_part( 'templates-parts/section-prestations');
get_template_part( 'templates-parts/section-citation' );
get_template_part( 'templates-parts/fullwidth-banner' );

// FAQ
get_template_part( 'templates-parts/section-faq' );

get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');
get_footer();
?>