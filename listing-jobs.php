<?php
/*
Template Name: Listing Jobs
*/

$cta_form    = get_field('formulaire_postuler');
$cta_contact = get_field('cta_contact');

get_header();
get_template_part('templates-parts/section-hero');
?>

<main id="acf-modulable-content" class="site-content">
  <?php get_template_part( 'templates-parts/block-builder' );?>
</main>

<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>
<?php get_footer(); ?>
