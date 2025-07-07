<?php 

$galerie = get_sub_field('galerie-sticky');
$title   = get_sub_field('title-sticky');
$descr   = get_sub_field('texte-sticky');

?>

<section id="sticky-columns">
    <div class="container columns">
        <div class="colg sticky">

            <?php if($title): echo $title; endif;?>
            <?php if($galerie):
            $i = 0;?>

            <div class="big-img block-img">
                <img src="<?php echo $galerie[0]['url'];?>" alt="<?php echo $galerie[0]['title'];?>"/>
            </div>
            <div class="grid-img">
                <?php foreach($galerie as $g):
                    if($i > 0 && $i < 3):?>
                        <div class="block-img">
                            <img src="<?php echo $g['url'];?>" alt="<?php echo $g['title'];?>"/>
                        </div>
                    <?php endif;
                    $i++;
                endforeach;?>
            </div>
            <?php endif;?>                    
        </div>
        <div class="cold">
            <?php if($descr): echo $descr; endif;?>
        </div>
    </div>
</section>