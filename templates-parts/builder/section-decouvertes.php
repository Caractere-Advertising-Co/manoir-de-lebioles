<?php 

$txtArdennes    = get_sub_field('texte-decouvertes');
$imgArdennes    = get_sub_field('image-decouvertes');
$ctaArdennes    = get_sub_field('cta-decouvertes');

?>


<section id="section-discover-columns">
  <div class="container columns content">
      <div class="colg">
        <?php if($txtArdennes): echo $txtArdennes; endif;?>
        <?php if($ctaArdennes):?>
          <a href="<?php echo $ctaArdennes;?>" class="cta from-left">
            <?php echo $ctaArdennes['title'];?>
          </a>
        <?php endif;?>
      </div>
      <div class="cold">
        <?php if($imgArdennes):?>
          <div class="block-img from-bottom">
            <img src="<?php echo $imgArdennes['url'];?>" alt="<?php echo $imgArdennes['title'];?>"/>
          </div>
        <?php endif;?>
        </div>
    </div>
</section>