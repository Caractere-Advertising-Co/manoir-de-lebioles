<?php 

/* Chef */

$bgChef         = get_field('bg-chef','options');
$txtChef        = get_field('txt-chef','options');
$ctaChef        = get_field('cta-chef','options');

?>

<section id="chef">
  <?php if($bgChef):?>
    <div id="backgroundChef">
      <img src="<?php echo $bgChef['url'];?>" alt="<?php echo $bgChef['title'];?>">
    </div>
  <?php endif;?>
  <div id="text">
    <div class="text">
      <?php if($txtChef): echo $txtChef; endif;?>
    </div>
  </div>
</section>