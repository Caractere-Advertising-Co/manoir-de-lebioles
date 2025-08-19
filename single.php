<?php

$cta_form    = get_field('formulaire_postuler');
$cta_contact = get_field('cta_contact');

/* PREV / NEXT */

$prev_post = get_previous_post();
$next_post = get_next_post();

get_header();

get_template_part('templates-parts/section-hero');
get_template_part( 'templates-parts/block-builder' );


?>

<section id="prev-next-post">
  <div class="container columns">
    <div class="colg from-bottom">
      <?php if ( ! empty( $prev_post ) ): ?>
        <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
          <div class="block-img">
            <img src="<?php echo get_the_post_thumbnail_url( $prev_post->ID );?>" alt="<?php echo get_the_post_thumbnail_caption( $prev_post->ID);?>" />
          </div>
          <h4><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></h4>
        </a>
      <?php endif;?>
    </div>
    
    <div class="cold from-bottom -slow">
      <?php if ( ! empty( $next_post ) ): ?>
        <a href="<?php echo get_permalink( $next_post->ID ); ?>">
          <div class="block-img">
             <img src="<?php echo get_the_post_thumbnail_url( $next_post->ID );?>" alt="<?php echo get_the_post_thumbnail_caption( $next_post->ID);?>" />
          </div>
          <h4><?php echo apply_filters( 'the_title', $next_post->post_title ); ?></h4>
        </a>
      <?php endif;?>
    </div>
  </div>
</section>

<?php

get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');

get_footer();?>
