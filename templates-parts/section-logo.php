<?php 
    $logosG = get_field('logo-guide-g','options');
    $logosD = get_field('logo-guide-d','options');
?>

<section id="section-logo">
    <div class="container columns content">
        <div class="colg">
            <?php if($logosG):foreach($logosG as $logo):?>
                <div class="block-img">
                    <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>"/>
                </div>
            <?php endforeach; endif;?>
        </div>
        <div class="cold">
          <?php if($logosD):foreach($logosD as $logo):?>
                <div class="block-img">
                    <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>"/>
                </div>
            <?php endforeach; endif;?>
        </div>
    </div>
</section>

