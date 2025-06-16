<?php 
    $logo = get_field('logos-guide','options');
?>

<section id="section-logo">
    <div class="container columns content">
        <div class="colg">
            <?php if($logos):foreach($logo as $logo):?>
                <div class="block-img" class="">
                    <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>"/>
                </div>
            <?php endforeach; endif;?>
        </div>
        <div class="cold">
        
        </div>
    </div>
</section>