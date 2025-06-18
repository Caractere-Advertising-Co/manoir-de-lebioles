<?php

$titreFAQ = get_field('titre-faq','options');
$ctaFaq = get_field('cta-faq','options');

$args = array(
    'post_type' => 'faq',
    'posts_per_page'=> 4,
    'post_statut' => 'publish'
);

$query = new WP_Query( $args );

?>

<section id="section-faq">
    <div class="container content">
        <?php if($titreFAQ): echo $titreFAQ; endif;?>

        <div class="listing-faqs">
            <?php if($query):
                while($query->have_posts()): $query->the_post();
                    echo '<div class="toggle-btn accordion"><h3>'.get_the_title().'</h3></div>';
                    echo '<div class="toggle-content panel"><p>'.get_the_content().'</p></div>';
                endwhile;
            endif;
            wp_reset_postdata();?>
        </div>

        <?php if($ctaFaq):?>
            <a href="<?php echo $ctaFaq['url'];?>" class="cta"><?php echo $ctaFaq['title'];?></a>
        <?php endif;?>
    </div>
</section>