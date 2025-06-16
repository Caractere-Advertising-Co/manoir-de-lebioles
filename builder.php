<?php
/*
Template Name: Page Builder
Description: Page vierge avec Elementor
*/
?>

<?php
// Elementor preview mode check
if ( isset($_GET['elementor-preview']) && $_GET['elementor-preview'] === 'true' ) {
    define( 'ELEMENTOR_PREVIEW', true );
}

get_header();
?>

<main id="elementor-content" class="site-content">
  <?php
  while ( have_posts() ) : the_post();
    the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
