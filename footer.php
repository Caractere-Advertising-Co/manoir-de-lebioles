<?php

$citationFooter = get_field('citation-footer','options');
$keywords       = get_field('keywords','options');

$copyright      = get_field('copyright','options');
$caractere      = get_field('caractere','options');

$logoFooter     = get_field('logo_footer','options');
$menuTop        = get_field('menuTop','options');
$menuBottom     = get_field('menuBottom','options');
$contact        = get_field('contactFooter','options');

?>

<footer>
    <div class="container">
        <div class="footer-middle-top">
            <div class="block-left">
                <?php if($logoFooter):?>
                    <div class="block-img">
                        <img src="<?php echo $logoFooter['url'];?>" alt="<?php echo $logoFooter['title'];?>"/>
                    </div>
                <?php endif;?>
            </div>
            <div class="block-right">
                <div class="columns">
                    <div class="colg"><?php if($contact): echo $contact;endif;?></div>

                    <div class="cold">
                        <?php if($menuTop):?>
                            <ul>
                                <?php foreach($menuTop as $mT):?>
                                    <li><a href="<?php echo get_permalink( $mT->ID );?>"><?php echo $mT->post_title;?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>
                <div class="menu-bottom">
                    <?php if($menuBottom):
                        foreach($menuBottom as $mB):
                            echo '<a href="'.get_permalink( $mB->ID ).'">'.$mB->post_title.'</a>';
                        endforeach;
                    endif;?>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <?php if($citationFooter): echo $citationFooter; endif;?>
        </div>
        <div class="footer-middle">
            <?php if($keywords): echo $keywords; endif;?>
        </div>
        <div class="footer_bottom">
            <?php if($copyright): echo $copyright; endif;?>
            <?php if($caractere): echo $caractere; endif;?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>