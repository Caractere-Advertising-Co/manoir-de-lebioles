<?php 

$galerie = get_field('galerie-hero');

if (is_singular('chambres')):
    $galerie = get_field('galerie-chambre');
elseif (is_singular('jobs')):
    $galerie = get_field('galerie-jobs');
elseif(is_singular( 'sejours' )):
    $galerie = get_field('galerie-hero');
endif;

$tiny = array(2572,2793,2560);

if($galerie):?>
<div id="hero_container" class="swiper swiper-hero <?php if(is_single() || in_array($tiny, get_current_blog_id(  ))): echo 'tiny' ;endif;?>">
    <div class="swiper-wrapper">
        <?php if($galerie): foreach($galerie as $g):

       if (is_singular('chambres')):
            $heroUrl        = $g['url'];
            $super          = get_field('superficie');
            $nbres          = get_field('nbre-personne');
        else : 
            $hero           = $g['hero'];
            $heroUrl        = $hero['url'];
            $titreHero      = $g['titre_hero'];
            $subTitleHero   = $g['soustitre_hero'];
        endif;?>
            <div class="swiper-slide" style="background:url('<?php if($heroUrl): echo $heroUrl;endif;?>');background-size:cover;" data-swiper-autoplay="5000">
                <div class="container from-left">
                    <?php if (!is_singular('chambres')):
                        if($titreHero): echo $titreHero; endif;
                        if($subTitleHero): echo $subTitleHero; endif;
                    endif;?>
                </div>
            </div>
        <?php endforeach;endif;?>
    </div>
            <?php if(is_singular( 'chambres' )):
            echo '<table>
                <tbody>
                    <tr>
                        <td colspan="2"><p class="titleFeatures">Features</p></td>
                    </tr>';
                    if($super): echo '<tr><td><div class="block-img"><img src="'.get_template_directory_uri(  ).'/assets/src/img/size.svg" alt="taille-chambre-manoir-de-lebioles"/></div></td><td><p>'.$super.'</p></td></tr>'; endif;
                    if($nbres): echo '<tr><td><div class="block-img"><img src="'.get_template_directory_uri(  ).'/assets/src/img/bed.svg" alt="nombre-personne-manoir-de-lebioles"/></div></td><td><p>'.$nbres.'</p></td></tr>'; endif;

                echo '</tbody>
            </table>';
        endif;?>
    <div class="swiper-pagination"></div>
</div>

<?php 
elseif (is_page_template( 'contact.php' )):
    $heroUrl      = $args['background'];
    $titreHero    = $args['title'];
    $subTitleHero = $args['surtitre'];
    $intro        = $args['intro'];
    $form         = $args['form'];?>

    <div id="hero_container" style="background:url('<?php if($heroUrl): echo $heroUrl;endif;?>');background-size:cover;">
        <div class="container columns from-left">
            <div class="colg">
                <?php if($subTitleHero): echo '<h2>'.$subTitleHero.'</h2>'; endif;?>
                <?php if($titreHero): echo $titreHero; endif;?>
                <?php if($intro): echo $intro; endif;?>
            </div>
            <div class="cold">
                <?php if($form): echo do_shortcode($form); endif;?>
            </div>   
        </div>
    </div>
<?php else:
    
    $hero           = get_field('hero');
    $heroUrl        = $hero['url'];
    $titreHero      = get_field('titre_hero');
    $subTitleHero   = get_field('soustitre_hero');    

?>

    <div id="hero_container" style="background:url('<?php if($heroUrl): echo $heroUrl;endif;?>');background-size:cover;">
        <div class="container from-left">
            <?php if($titreHero): echo $titreHero; endif;?>
            <?php if($subTitleHero): echo $subTitleHero; endif;?>
        </div>
    </div>

<?php endif;?>