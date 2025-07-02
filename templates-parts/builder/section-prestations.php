<?php /* Prestation */

if(is_page_template('builder.php')):
  $titrePresta    = get_sub_field('titre-presta');
  $txtPresta      = get_sub_field('txt-presta');
  $slider         = get_sub_field('slide-prestation');
else :
  $titrePresta    = get_field('titre-presta','options');
  $txtPresta      = get_field('txt-presta','options');
  $slider         = get_field('slide-prestation','options');
endif;
?>

<section id="prestation-infra">
  <div class="container columns content">
    <div class="colg">
        <?php if($titrePresta): echo $titrePresta; endif;?>
    </div>
    <div class="cold">
        <?php if($txtPresta): echo $txtPresta; endif;?>
    </div>
  </div>

  <div class="swiper swiper-prestation">
    <div class="swiper-wrapper">
      <?php if($slider):
        foreach($slider as $slide):
          $img   = $slide['background'];
          $lien  = $slide['cta'];?>
          
          <div class="swiper-slide">
            <a href="<?php echo $lien['url'];?>">
                <img src="<?php echo $img['url'];?>" alt="<?php echo $img['name'];?>"/>
                <div class="overlay"><?php echo '<h3>'.$lien['title'].'</h3>';?></div>
            </a>
          </div>
        <?php endforeach;
      endif;?>
    </div>
  </div>
</section>