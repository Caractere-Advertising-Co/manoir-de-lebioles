<?php 

$args = array(
    'post_type'      => 'sejours',
    'posts_per_page' => -1, // fixed typo: was 'post_per_page'
    'post_status'    => 'publish' // fixed typo: was 'post_statut'
);

$query = new WP_Query($args);
?>

<section id="sejours">
    <div class="container grid block-sejour">
        <?php if ($query->have_posts()):
            $i = 0;
            while ($query->have_posts()): $query->the_post(); // fixed: was the_posts()
                $galerie = get_field('galerie-hero');
                $bg = $galerie['hero']['url'] ?? null; // added null coalescing in case it's empty

                $titre = get_the_title();
                $lien  = get_permalink();
                ?>

                <div class="col from-bottom <?php echo ($i % 2 != 0) ? '-slow' : ''; ?>">
                    <div class="block-img">
                        <?php if ($bg): ?>
                            <img src="<?php echo esc_url($bg['url']); ?>" alt="<?php echo esc_attr($bg['title']); ?>"/>
                        <?php endif; ?>
                    </div>
                    <h4><?php echo esc_html($titre); ?></h4>
                    <a href="<?php echo esc_url($lien); ?>" class="cta-line">En savoir plus</a>
                </div>
                <?php $i++;
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>
