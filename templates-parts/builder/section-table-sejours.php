<?php 

$args = array(
    'post_type' => 'sejours',
    'post_per_page' => -1,
    'post_statut' => 'publish'
);

$query = new WP_Query($args);

?>

<section id="sejours">

    <div class="container grid block-sejour">
        <?php if($query->have_posts()):
            $i = 0;
            while($query->have_posts()): $query->the_posts();
                $galerie = get_field('galerie-hero');
                $bg      = $galerie['hero'][0];

                $titre = get_the_title();
                $lien = get_permalink( );?>
            
            <div class="col from-bottom <?php echo $i % 2 != 0 ? '-slow' : '';?>">
                <div class="block-img">
                    <img src="<?php echo $bg['url'];?>" alt="<?php echo $bg['title'];?>"/>
                </div>
                <h4><?php echo $titre;?></h4>
                <a href="<?php echo $lien;?>" class="cta-line">En savoir plus</a>
            </div>
            <?php $i++; endwhile;

            wp_reset_postdata(  );
        endif;?>
    </div>
</section>