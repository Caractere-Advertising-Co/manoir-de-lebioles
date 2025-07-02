<?php 

$galerie     = get_field('galerie-chambre');
$title       = get_the_title();
$surtitre    = get_field('surtitre-chambre');
$description = get_field('description-chambre');

$ctaRes      = get_field('cta_reservation'); 
$ctaOff      = get_field('cta_offrir');

get_header();

get_template_part( 'templates-parts/section-hero');

?>

<section id="description-chambre">
    <div class="container">
        <?php if($surtitre): echo '<h2>'.$surtitre.'</h2>'; endif;?>
        <?php if($title): echo '<h1>'.$title.'</h1>';endif;?>
        <?php if($description): echo $description; endif;?>

        <div class="columns block-cta">
            <?php if($ctaOff):?>
                <a href="<?php echo $ctaRes['url'];?>" class="cta"><?php echo $ctaRes['title'];?></a>
            <?php endif;?>
            <?php if($ctaOff):?>
                <a href="<?php echo $ctaOff['url'];?>" class="cta-white"><?php echo $ctaOff['title'];?></a>
            <?php endif;?>
        </div>
    </div>
</section>

<section id="galerie-chambre">
    <div class="container">
        <div class="swiper swiper-galerie-chambre">
            <div class="swiper-wrapper">
                <?php if($galerie): 
                    foreach($galerie as $g):?>
                        <div class="swiper-slide">
                            <a fslightbox href="<?php echo $g['url'];?>" class="block-img">
                                <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>"/>
                            </a>
                        </div>
                    <?php endforeach; 
                endif;?>
            </div>
        </div>
        <div class="swiper-button-prev btnPrevGalChambre"></div>
        <div class="swiper-button-next btnNextGalChambre"></div>
    </div>
</section>

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
    </div>
</section>

<?php 

get_template_part( 'templates-parts/builder/section-citation' );
get_template_part( 'templates-parts/section-sejours' );
get_template_part( 'templates-parts/section-discoverRooms' );
get_template_part('templates-parts/section-logo');
get_template_part('templates-parts/section-newsletter');
get_footer();

?>