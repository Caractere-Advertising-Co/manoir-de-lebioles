<?php 

$args = array(
    'post_type'      => 'sejours',
    'posts_per_page' => -1, 
    'post_status'    => 'publish' 
);

$query = new WP_Query($args);
?>

<section id="sejours">
    <div class="container grid block-sejour">
        <?php if ($query->have_posts()):
            $i = 0;
            while ($query->have_posts()): $query->the_post(); // fixed: was the_posts()
                $galerie = get_field('galerie-hero');
                $bg = $galerie[0]['hero']['url']; // added null coalescing in case it's empty
                $bgTitle = $galerie[0]['hero']['title'];

                $titre = get_the_title();
                $lien  = get_permalink();
                ?>

                    <div class="col from-bottom <?php echo ($i % 2 != 0) ? '-slow' : ''; ?>">
                        <a href="<?php echo esc_url($lien); ?>">
                            <div class="block-img">
                                <?php if($bg): ?>
                                    <img src="<?php echo esc_url($bg); ?>" alt="<?php echo esc_attr($bgTitle); ?>"/>
                                <?php endif; ?>
                            </div>
                            <h4><?php echo $titre; ?></h4>
                            <span class="cta-line">En savoir plus</span>
                        </a>
                    </div>
                <?php $i++;
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>
