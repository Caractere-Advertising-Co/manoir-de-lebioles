<?php

$titre = get_sub_field('titre-simple');
$intro = get_sub_field('intro-simple');

?>

<section id="text-simple">
    <div class="container content">
        <?php if($titre): echo $titre; endif;?>
        <?php if($intro): echo $intro; endif;?>
    </div>
</section>