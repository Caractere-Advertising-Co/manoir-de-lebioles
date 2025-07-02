<?php 

$bgScale       = get_field('bgScale');
$txtScale         = get_field('txtScale');
$ctaScale     = get_field('ctaScale');

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
          <a class="cta -border" href="<?php echo $ctaScale['url'];?>">
            <?php echo $ctaScale['title'];?>
          </a>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>