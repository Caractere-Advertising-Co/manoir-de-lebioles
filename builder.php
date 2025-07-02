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
get_template_part('templates-parts/section-hero');?>

<main id="elementor-content" class="site-content">
  <?php while ( have_posts() ) : the_post();
    the_content();
  endwhile;?>
</main>

<main id="acf-modulable-content" class="site-content">
  <?php get_template_part( 'templates-parts/block-builder' );?>
</main>

<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>
<?php get_footer(); ?>
