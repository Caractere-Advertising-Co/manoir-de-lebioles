<?php
/*
Template Name: Single Jobs
*/

$cta_form    = get_field('formulaire_postuler');
$cta_contact = get_field('cta_contact');

get_header();

get_template_part('templates-parts/section-hero');
?>

<section id="description-chambre">
    <div class="container">
        <?php the_content();?>
        
        <div class="columns block-cta">
                <a href="<?php echo $cta_form  ['url'];?>" class="cta"><?php echo $cta_form  ['title'];?></a>
                <a href="<?php echo $cta_contact['url'];?>" class="cta-white"><?php echo $cta_contact['title'];?></a>
        </div>
    </div>
</section>

<main id="acf-modulable-content" class="site-content">
  <?php get_template_part( 'templates-parts/block-builder' );?>
</main>


<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>
<?php get_footer(); ?>
