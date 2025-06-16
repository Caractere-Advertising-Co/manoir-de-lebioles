<?php 
    $titreActus = get_field('titre-actualites','options');
    $txtActus   = get_field('txt-actualites','options');

    $args       = array(
        'post_type' => 'post',
        'posts_per_page'=> 3,
        'post_statut' => 'publish'
    );

    $query = new WP_Query( $args );

    $ctaActus = get_field('cta-actualites','options');
?>

<section id="section-actualites">
  <div class="container columns intro content">
    <div class="colg">
        <?php if($titreActus): echo $titreActus; endif;?>
    </div>
    <div class="cold">
        <?php if($txtActus): echo $txtActus; endif;?>
    </div>
  </div>
  <div class="container columns grid-actus content">
    <?php if($query):
        while($query->have_posts()): $query->the_post();?>
            <div class="card-actus">
                <div class="block-img imgCard">
                    <img src="<?php echo the_post_thumbnail_url(  );?>" alt="<?php echo the_post_thumbnail_caption( );?>" />
                    <span class="date"><?php echo get_the_date("d.m.Y");?></span>
                </div>
                <h3 class="titleCard"><?php the_title();?></h3>
                <?php the_excerpt( );?>
                <a href="#" class="ctaCard">Lire plus</a>
            </div>
        <?php endwhile;
    endif;
    
     wp_reset_postdata();?>
</div>
<div class="container contCta">
    <?php if($ctaActus): echo '<a href="'.$ctaActus['url'].'" class="cta">'.$ctaActus['title'].'</a>'; endif;?>
</div>
</section>