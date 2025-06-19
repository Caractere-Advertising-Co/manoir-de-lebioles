<?php 

if(is_front_page(  )):

$galerie = get_field('galerie-hero');
?>
<div id="hero_container" class="swiper swiper-hero">
    <div class="swiper-wrapper">
        <?php if($galerie): foreach($galerie as $g):
            $hero           = $g['hero'];
            $titreHero      = $g['titre_hero'];
            $subTitleHero   = $g['soustitre_hero'];
        ?>
            <div class="swiper-slide" style="background:url('<?php if($hero): echo $hero['url'];endif;?>');background-size:cover;" data-swiper-autoplay="5000">
                <div class="container from-left">
                    <?php if($titreHero): echo $titreHero; endif;?>
                    <?php if($subTitleHero): echo $subTitleHero; endif;?>
                </div>
            </div>
        <?php endforeach;endif;?>
    </div>
    <div class="swiper-pagination"></div>
</div>

<?php else:
    
    $hero           = get_field('hero');
    $titreHero      = get_field('titre_hero');
    $subTitleHero   = get_field('soustitre_hero');    

?>

    <div id="hero_container" style="background:url('<?php if($hero): echo $hero['url'];endif;?>');background-size:cover;">
        <div class="container from-left">
            <?php if($titreHero): echo $titreHero; endif;?>
            <?php if($subTitleHero): echo $subTitleHero; endif;?>
        </div>
    </div>

<?php endif;?>