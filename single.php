<?php

$cta_form    = get_field('formulaire_postuler');
$cta_contact = get_field('cta_contact');

get_header();

get_template_part('templates-parts/section-hero');
get_template_part( 'templates-parts/block-builder' );
get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');

get_footer();?>
