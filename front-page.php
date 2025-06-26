<?php 

// $hero           = get_field('hero');
// $titreHero      = get_field('titre_hero');
// $subTitleHero   = get_field('soustitre_hero');

$ctaSej         = get_field('cta_citation'); 

/* Chambre */

$titreChambre   = get_field('titre-chambre');
$txtChambre     = get_field('txt-chambre');
$ctaChambre     = get_field('cta_chambre');

$skyView        = get_field('skyview-parallax','options');

$fLeft          = get_field('fleche-gauche','options');
$fRight         = get_field('fleche-droite','options');


/* Ardennes */

$txtArdennes    = get_field('texte-ardennes');
$imgArdennes    = get_field('image-ardennes');
$ctaArdennes    = get_field('cta-ardennes');


/* Piscine */

$bgPiscine      = get_field('bg-piscine');
$txtPiscine     = get_field('txt-piscine');
$ctaPiscine     = get_field('cta-piscine');

get_header();?>

<?php get_template_part( 'templates-parts/section-hero');?>
<?php get_template_part( 'templates-parts/separator/line' );?>

<section id="introduction">
    <div class="container columns content">
      <?php if(have_rows('colonne_gauche')):
        while(have_rows('colonne_gauche')): the_row();?>
          <div class="colg">
            <?php
            $txtIntro = get_sub_field('txt_intro');
            if($txtIntro): echo $txtIntro; endif;?>
          </div>
        <?php endwhile;
      endif;?>
      <?php if(have_rows('colonne_droite')):
            while(have_rows('colonne_droite')): the_row();?>
            <div class="cold">
                <?php

                $surtitreIntro = get_sub_field('surtrite_intro');
                $titreIntro = get_sub_field('titre_intro');

                if($surtitreIntro): echo '<h2 class="from-right">'.$surtitreIntro.'</h2>'; endif;
                if($titreIntro): echo $titreIntro; endif;
            ?></div><?php 
            endwhile;
        endif;?>
    </div>
    <div class="container columns content img">
        <?php if(have_rows('colonne_gauche')):
            while(have_rows('colonne_gauche')): the_row();?>
            <div class="colg">
                <?php
                $imgIntro = get_sub_field('image_intro');
                if($imgIntro):?>
                    <div class="block-img from-bottom">
                        <img src="<?php echo $imgIntro['url'];?>" alt="<?php echo $imgIntro['name'];?>"/>
                    </div>
                <?php endif;?>
            </div>
            <?php endwhile;
        endif;?>
        <?php if(have_rows('colonne_droite')):
            while(have_rows('colonne_droite')): the_row();?>
            <div class="cold">
                <?php
                $txtIntro      = get_sub_field('txt_dte_intro');
                $galerie       = get_sub_field('galerie_intro');
                $cta           = get_sub_field('cta_intro');
                $cta_2         = get_sub_field('cta_2_intro');

                if($galerie):
                    echo '<div class="block-galerie">';
                    $i = 0;
                    foreach($galerie as $g): ?>
                        <div class="block-img from-bottom <?php echo $i != 0 ? '-slow' :'';?>">
                            <img src="<?php echo $g['url'];?>" alt="<?php echo $g['name'];?>"/>
                        </div>
                    <?php $i++; endforeach;
                    echo '</div>';
                endif;

                if($txtIntro): echo $txtIntro; endif;

                echo '<div class="block-cta">';
                    if($cta): echo '<a href="'.$cta['url'].'" class="cta from-bottom">'.$cta['title'].'</a>'; endif;
                    if($cta_2): echo '<a href="'.$cta_2['url'].'" class="cta-white from-bottom">'.$cta_2['title'].'</a>'; endif;
                echo '</div>';
            echo '</div>';
            endwhile;
        endif;?>
    </div>
</section>

<section id="chambres-suites">
  <div class="container columns content">
    <div class="colg">
        <?php if($titreChambre): echo $titreChambre; endif;?>
    </div>
    <div class="cold">
        <?php if($txtChambre): echo $txtChambre; endif;?>
    </div>
  </div>

  <div class="container content">
    <div class="swiper swiper-chambre">
      <div class="swiper-wrapper">
        <?php
        $args = [
          'post_type' => 'chambres',
          'posts_per_page' => -1
        ];

        $chambres = new WP_Query($args);

        if ($chambres->have_posts()):
          while ($chambres->have_posts()): $chambres->the_post();
            $gallery = get_field('galerie-chambre');

            if ($gallery):
              $thumb = $gallery[0]['sizes']['large'];
              ?>
              <div class="swiper-slide" data-id="<?= get_the_ID(); ?>">
                <img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr(get_the_title()); ?>">
              </div>
              <?php
            endif;
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>

    <?php if($fLeft):?>
      <div class="swiper-button-prev chambre-button-prev">
        <img src="<?php echo $fLeft['url'];?>" alt="<?php echo $fLeft['title'];?>" />
      </div>
    <?php endif;?>
    <?php if($fRight):?>
      <div class="swiper-button-next chambre-button-next">
          <img src="<?php echo $fRight['url'];?>" alt="<?php echo $fRight['title'];?>" />
      </div>
    <?php endif;?>
  </div>

  <div class="container">
    <?php if($ctaChambre):?>
        <a href="<?php echo $ctaChambre['url'];?>" class="cta"><?php echo $ctaChambre['title'];?></a>
    <?php endif;?>
    </div>
    <div id="lightbox-container"></div>
  </div>
</section>

<section id="parallax-sky">
    <?php if($skyView):?>
        <div class="parallax-bg" style="background-image: url('<?php echo $skyView['url'];?>');"></div>
    <?php endif;?>
</section>

<?php get_template_part( 'templates-parts/section-prestations');?>
<?php get_template_part( 'templates-parts/section-citation' );?>
<?php get_template_part( 'templates-parts/section-sejours' );?>

<?php get_template_part( 'templates-parts/fullwidth-banner' );?>

<section id="ardennes">
  <div class="container columns content">
      <div class="colg">
        <?php if($txtArdennes): echo $txtArdennes; endif;?>
        <?php if($ctaArdennes):?>
          <a href="<?php echo $ctaArdennes;?>" class="cta from-left">
            <?php echo $ctaArdennes['title'];?>
          </a>
        <?php endif;?>
      </div>
      <div class="cold">
        <?php if($imgArdennes):?>
          <div class="block-img from-bottom">
            <img src="<?php echo $imgArdennes['url'];?>" alt="<?php echo $imgArdennes['title'];?>"/>
          </div>
        <?php endif;?>
        </div>
    </div>
</section>

<section id="galerie-ardennes">
  <?php 
    $galerie = get_field('galerie-ardennes');
    $i = 0;

    if($galerie):
      foreach($galerie as $g):
        switch($i):
          case 0:
            echo '<div class="bigImg block-img from-bottom"><img src="'.$g['url'].'" alt="'.$g['title'].'"></div>';
            break;
          case 1:
            echo '<div class="smallImg1 block-img from-bottom -slow"><img src="'.$g['url'].'" alt="'.$g['title'].'"></div>';
            break;
          case 2:
            echo '<div class="smallImg2 block-img from-bottom -veryslow"><img src="'.$g['url'].'" alt="'.$g['title'].'"/></div>';
            break;
          case 3:
            echo '<div class="smallImg3 block-img from-bottom -slow"><img src="'.$g['url'].'" alt="'.$g['title'].'"/></div>';
            break;
          case 4:
            echo '<div class="smallImg4 block-img from-bottom -veryslow"><img src="'.$g['url'].'" alt="'.$g['title'].'"/></div>';
            break;
          default:
            echo '<div class="smallImg1 block-img from-bottom -slow"><img src="'.$g['url'].'" alt="'.$g['title'].'"/></div>';
            break;
        endswitch;

        $i++;
      endforeach;
    endif;
  ?>
</section>

<?php get_template_part( 'templates-parts/section-evenements' );?>
<?php get_template_part( 'templates-parts/section-chef');?>

<section id="piscine">
  <?php if($bgPiscine):?>
    <div id="backgroundPiscine">
      <img src="<?php echo $bgPiscine['url'];?>" alt="<?php echo $bgPiscine['title'];?>">
    </div>
  <?php endif;?>
  <div id="textPiscine">
    <div class="text">
      <?php if($txtPiscine): echo $txtPiscine; endif;?>
    </div>
  </div>
</section>

<?php get_template_part( 'templates-parts/section-actualites' );?>
<?php get_template_part( 'templates-parts/section-logo' );?>
<?php get_template_part( 'templates-parts/section-newsletter' );?>
<?php get_footer();?>