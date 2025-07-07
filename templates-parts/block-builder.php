  <?php 
  
  $repo = "templates-parts/";
  $builder =  $repo . "builder/";
  
  if(have_rows('contenu_modulable')):
    while(have_rows('contenu_modulable')): the_row('contenu_modulable');
      
      if( get_row_layout() == 'citation' ):
        get_template_part( $builder . 'section-citation');
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
        get_template_part( $builder . 'section-experience-unique' );
      elseif( get_row_layout() == "texte-centre"):
        get_template_part( $builder . 'section-simple' );
      elseif( get_row_layout() == "chef"):
        get_template_part( $builder . 'section-chef' );
      elseif( get_row_layout() == "scale"):
        get_template_part( $builder . 'section-scale-vierge' );
      elseif( get_row_layout() == "prestation"):
        get_template_part( $builder . 'section-prestations' );
      elseif( get_row_layout() == "saveurs"):
        get_template_part( $builder . 'section-saveurs' );
      elseif( get_row_layout() == "relax"):
        get_template_part( $builder . 'section-relax' );
      elseif( get_row_layout() == "section_two_columns"):
        get_template_part( $builder . 'section-2-columns' );
      elseif( get_row_layout() == "new-era"):
        get_template_part( $builder . 'section-new-era' );
      elseif( get_row_layout() == "image-fullscreen"):
        get_template_part( $builder . 'section-banner-fullwidth' );
      elseif( get_row_layout() == "intro-about"):
        get_template_part( $builder . 'section-intro-about' );
      elseif( get_row_layout() == "section-about-contact"):
        get_template_part( $builder . 'section-contact-about');
      elseif( get_row_layout() == "banner-fullwidth"):
        get_template_part( $repo . 'fullwidth-banner');
      elseif( get_row_layout() == "sticky-columns"):
        get_template_part( $builder . 'section-sticky-columns');
      elseif( get_row_layout() == "sticky-columns-right"):
        get_template_part( $builder . 'section-sticky-columns-right');
      elseif( get_row_layout() == "banner-form-contact"):
        get_template_part( $repo . 'section-contact');
      elseif( get_row_layout() == "listing-jobs"):
        get_template_part( $builder . 'section-listing-jobs');
      elseif( get_row_layout() == "slider-decouverte"):
        get_template_part( $builder . 'section-discover');
      elseif( get_row_layout() == "grille-sejour"):
        get_template_part( $builder . 'section-table-sejours');
      endif;
    endwhile;
  endif;?>