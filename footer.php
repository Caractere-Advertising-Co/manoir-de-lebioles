<?php

$citationFooter = get_field('citation-footer','options');
$keywords       = get_field('keywords','options');

$copyright      = get_field('copyright','options');
$caractere      = get_field('caractere','options');

?>

<footer>
    <div class="container">
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