<?php 

$titreCitation = get_field('titre_citation','options');
$ctaCitation   = get_field('cta_citation','options');

?>

<section id="citation">
    <div class="container text-center m-auto">
        <?php if($titreCitation): echo $titreCitation; endif;?>
        <?php if($ctaCitation):?>
            <a href="<?php echo $ctaCitation['url'];?>" class="cta-line from-bottom"><?php echo $ctaCitation['title'];?></a>
        <?php endif;?>
    </div>
</section>