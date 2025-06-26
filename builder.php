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

get_template_part('templates-parts/section-hero');
?>


<main id="elementor-content" class="site-content">
  <?php
  while ( have_posts() ) : the_post();
    the_content();
  endwhile;
  ?>
</main>

<main id="acf-modulable-content" class="site-content">
  <?php if(have_rows('contenu_modulable')):
    while(have_rows('contenu_modulable')): the_row('contenu_modulable');
      
      if( get_row_layout() == 'citation' ):
        get_template_part('templates-parts/section-citation');
      elseif( get_row_layout() == "description"):
        $surtitre = get_sub_field('surtitre');
        $description= get_sub_field('description');
        $blockCta = get_sub_field('groupe_cta');?>
          
        <section id="description-chambre">
          <div class="container">
            <?php if($surtitre): echo '<h2>'.$surtitre.'</h2>'; endif;?>
            <?php if($description): echo $description; endif;?>

            <div class="columns block-cta">
              <?php foreach($blockCta as $cta):
                $link = $cta['cta'];?>
                <a href="<?php echo $link['url'];?>" class="cta"><?php echo $link['title'];?></a>
              <?php endforeach;?>
            </div>
          </div>
        </section>
      <?php elseif( get_row_layout() == "groupe-informations"):?>
        <section id="informations-toggle">
          <div class="container listing-infos">
            <?php if(have_rows('informations')):
              while(have_rows('informations')): the_row('informations');
                $titre = get_sub_field('titre_information');
                $descr = get_sub_field('description_information');

                echo '<div class="toggle-btn accordion"><h3>'.$titre.'</h3></div>';
                echo '<div class="toggle-content panel"><p>'.$descr.'</p></div>';
              endwhile;
            endif;?>
          </div>
        </section>
      <?php elseif( get_row_layout() == "galerie"):
        $galerie = get_sub_field('galerie');?>
        <section id="galerie-builder">
            <div class="container">
                <div class="swiper swiper-galerie-builder">
                    <div class="swiper-wrapper">
                        <?php if($galerie): 
                            foreach($galerie as $g):?>
                                <div class="swiper-slide">
                                    <a data-fslightbox href="<?php echo $g['url'];?>" class="block-img">
                                        <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>"/>
                                    </a>
                                </div>
                            <?php endforeach; 
                        endif;?>
                    </div>
                </div>
                <div class="swiper-button-prev btnPrevGalBuilder"></div>
                <div class="swiper-button-next btnNextGalBuilder"></div>
            </div>
        </section>
      <?php elseif( get_row_layout() == "experience_unique"):
        get_template_part( 'templates-parts/section-experience-unique' );
      elseif( get_row_layout() == "chef"):
        get_template_part( 'templates-parts/section-chef' );
      elseif( get_row_layout() == "prestation"):
        get_template_part( 'templates-parts/section-prestations' );
      endif;
    endwhile;
  endif;?>
</main>

<?php get_template_part('templates-parts/fullwidth-banner');?>
<?php get_template_part('templates-parts/section-contact');?>
<?php get_template_part('templates-parts/section-logo');?>
<?php get_template_part('templates-parts/section-newsletter');?>
<?php get_footer(); ?>
