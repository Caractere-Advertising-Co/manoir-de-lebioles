<?php 

$fullWidth = get_sub_field('bg-fullwidth');
$titre     = get_sub_field('title-fullwidth');
$cta       = get_sub_field('cta-fullwidth');

if(empty($fullWidth)):
    $fullWidth = get_field('bg-fullwidth','options');
    $titre     = get_field('title-fullwidth','options');
    $cta       = get_field('cta-fullwidth','options');
endif;

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