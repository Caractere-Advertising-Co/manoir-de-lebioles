<?php 

$bgScale      = get_sub_field('bgScale');
$txtScale     = get_sub_field('txtScale');
$ctaScale     = get_sub_field('ctaScale');
$videoScale   = get_sub_field('videoScale');

?>

<section id="chef">
  <?php if($bgScale):?>
    <div id="backgroundChef">
      <img src="<?php echo $bgScale['url'];?>" alt="<?php echo $bgScale['title'];?>">
    </div>
  <?php endif;?>
  <div id="text">
    <div class="text container columns">
      <div class="colg">
        <?php if($txtScale): echo $txtScale; endif;?>
      </div>
      <div class="cold">
        <?php if($ctaScale):?>
          <a class="cta -border" <?php echo $videoScale == true ? 'href="#!" data-video="popup-video" id="triggerVideo"' : 'href="'.$ctaScale['url'].'"';?>>
            <?php echo $ctaScale['title'];?>
          </a>
        <?php endif;?>
      </div>
    </div>
  </div>
  <?php if($videoScale == true):?>
      <div id="popup-video">
        <span id="hideVideo">x</span>
        <video width="1280" height="720" controls>
          <source src="<?php echo $ctaScale['url'];?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
  <?php endif;?>
</section>