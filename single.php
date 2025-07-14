<?php

$cta_form    = get_field('formulaire_postuler');
$cta_contact = get_field('cta_contact');

get_header();

get_template_part('templates-parts/section-hero');
?>

<?php get_template_part( 'templates-parts/block-builder' );?>

<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>
<?php get_footer(); ?>
