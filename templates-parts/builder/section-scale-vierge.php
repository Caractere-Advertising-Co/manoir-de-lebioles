<?php 

$bgScale      = get_sub_field('bgScale');
$txtScale     = get_sub_field('txtScale');
$ctaScale     = get_sub_field('ctaScale');
$videoScale   = get_sub_field('videoScale');

?>

<section class="scaleVierge scale-section">
 

  <?php if($videoScale == true):?>
    <video width="1920" height="1080" controls>
      <source src="<?php echo $ctaScale['url'];?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
  <?php else :?>

     <?php if($bgScale):?>
      <div class="backgroundScale">
        <img src="<?php echo $bgScale['url'];?>" alt="<?php echo $bgScale['title'];?>">
      </div>
    <?php endif;?>
    <div class="textScale">
      <div class="text container columns">
        <?php if($txtScale):?>
          <div class="colg">
            <?php echo $txtScale; ?>
          </div>
        <?php endif;?>
        <div class="cold">
          <?php if($ctaScale):?>
            <a class="cta -border"  href="<?php echo $ctaScale['url'];?>">
              <?php echo $ctaScale['title'];?>
            </a>
          <?php endif;?>
        </div>
      </div>
    </div>

  <?php endif;?>
</section>
