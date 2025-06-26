<?php 

$adr = get_field('adresse_top_header','options');
$tel = get_field('telephone_top_header','options');?>

<section id="banner-top">
    <div class="container columns">
        <div class="contact columns">
            <?php if($tel): echo '<a href="'.$tel['url'].'">'.$tel['title'].'</a>';endif;?>
            <?php if($adr): echo '<p>'.$adr.'</p>'; endif;?> 
        </div>
        <div class="rs columns">
            <?php 
            
            $rs = get_field('rs_top_header','options');
            echo do_shortcode( '[wpml_language_selector_widget]');
            if($rs):
                foreach($rs as $r):
                    $icone = $r['icone'];
                    $link  = $r['url'];?>
                
                    <a href="<?php echo $link;?>" class="block-img"><img src="<?php echo $icone['url'];?>" alt="<?php echo $icone['title'];?>"/></a>
                <?php endforeach;
            endif;?>
        </div>
    </div>
</section>