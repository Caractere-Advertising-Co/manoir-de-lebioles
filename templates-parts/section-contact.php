<?php

$surtitre = get_field('surtitre-form');
$titre    = get_field('titre-form');
$form     = get_field('shortcode-form');

?>

<section id="section-form-contact">
    <div class="container content">
        <?php if($surtitre): echo $surtitre; endif;?>
        <?php if($titre): echo $titre; endif;?>
        <?php if($form): echo do_shortcode( $form ); endif;?>
    </div>
</section>