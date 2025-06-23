<?php /* Prestation */

$titrePresta    = get_field('titre-presta','options');
$txtPresta      = get_field('txt-presta','options');

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
      <?php if(have_rows('slide-prestation','options')):
        while(have_rows('slide-prestation','options')): the_row('slide-prestation','options');
          $img   = get_sub_field('background');
          $lien  = get_sub_field('cta');?>
          
          <div class="swiper-slide">
            <a href="<?php echo $lien['url'];?>">
                <img src="<?php echo $img['url'];?>" alt="<?php echo $img['name'];?>"/>
                <div class="overlay"><?php echo '<h3>'.$lien['title'].'</h3>';?></div>
            </a>
          </div>
        <?php endwhile;
      endif;?>
    </div>
  </div>
</section>