<?php 
/* Template Name: Page Contact */

$title          = get_field('titre-contact','options');
$surtitre       = get_field('sub_contact','options');
$intro          = get_field('texte-contact','options');
$form           = get_field('shortcode_form','options');

$heroBg         = get_field('hero_background','options');

$args = array( 
    'background' => $heroBg['url'],
    'title'      => $title,
    'surtitre'   => $surtitre,
    'intro'      => $intro,
    'form'       => $form
);

get_header();
get_template_part('templates-parts/section-hero','hero', $args);?>

<?php get_template_part('templates-parts/section-faq');?>
<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>

<?php get_footer(); ?>

