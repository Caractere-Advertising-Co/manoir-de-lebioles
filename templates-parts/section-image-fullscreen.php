<?php 


$bgFullScreen         = get_sub_field('Image_fullscreen');
$txtFullscreen        = get_sub_field('texte_fullscreen');
$ctaFullscreen        = get_sub_field('cta_fullscreen');

?>

<section id="section-image-fullscreen">
  <?php if($bgFullScreen):?>
    <div id="backgroundFullScreen">
      <img src="<?php echo $bgFullScreen['url'];?>" alt="<?php echo $bgFullScreen['title'];?>">
    </div>
  <?php endif;?>
  <div id="textFullscreen">
    <div class="text container columns">
      <div class="colg">
        <?php if($txtFullscreen): echo $txtFullscreen ; endif;?>
      </div>
      <div class="cold">
        <?php if($ctaFullscreen):?>
          <a class="cta -border" href="<?php echo$ctaFullscreen ['url'];?>">
            <?php echo $ctaFullscreen ['title'];?>
          </a>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>