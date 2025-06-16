<?php 

$fullWidth = get_field('bg-fullwidth','options');
$titre     = get_field('title-fullwidth','options');
$cta       = get_field('cta-fullwidth','options');

?>

<section id="fullwidth-banner">
    <?php if($fullWidth):?>
        <div class="parallax-bg" style="background-image: url('<?php echo $fullWidth['url'];?>');"></div>
        <?php if($titre): echo $titre; endif;?>
        <?php if($cta):?>
            <a href="<?php echo $cta['url'];?>" class="cta-line from-bottom"><?php echo $cta['title'];?></a>
        <?php endif;?>
    <?php endif;?>
</section>