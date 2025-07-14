<?php 

/* Template-name: Page Blog */

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'post_per_page' => -1
);

$query = new WP_Query($args);

?>

<?php get_template_part( 'templates-parts/block-builder' );?>

<section id="grid-blog">
    <div class="container columns grid-actus">
        <?php if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
                
            $title = get_the_title();
            $url = get_permalink();
            $excerpt = get_the_excerpt();

            ?>

            <div class="card-actus">
                <a href="<?php echo $url;?>">
                    <div class="block-img imgCard">
                        <img src="<?php echo the_post_thumbnail_url(  );?>" alt="<?php echo the_post_thumbnail_caption( );?>" />
                        <span class="date"><?php echo get_the_date("d.m.Y");?></span>
                    </div>
                    <h3 class="titleCard"><?php echo $title;?></h3>
                    <?php echo substr($excerpt,0,150).'...';?>
                    <p class="ctaCard">Lire plus</p>
                </a>
            </div>
            <?php endwhile;
        endif;

        wp_reset_postdata(  );?>
    </div>
</section>

