<?php 

$hero           = get_field('hero');
$titreHero      = get_field('titre_hero');
$subTitleHero   = get_field('soustitre_hero');

?>

<div id="hero_container"  style="background:url('<?php if($hero): echo $hero['url'];endif;?>');background-size:cover;">
    <div class="container from-left">
        <?php if($titreHero): echo $titreHero; endif;?>
        <?php if($subTitleHero): echo $subTitleHero; endif;?>
    </div>
</div>