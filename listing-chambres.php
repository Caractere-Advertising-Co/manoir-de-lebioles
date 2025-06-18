<?php 
/* Template Name: Listing Chambres */

get_header();

get_template_part( 'templates-parts/section-hero');

// Détail listing

get_template_part( 'templates-parts/section-prestations');
get_template_part( 'templates-parts/section-citation' );
get_template_part( 'templates-parts/fullwidth-banner' );

// FAQ

get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');
get_footer();
?>