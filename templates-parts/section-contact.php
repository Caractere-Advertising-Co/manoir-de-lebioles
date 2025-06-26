<?php

$surtitre = get_field('surtitre-form');
$titre    = get_field('titre-form');
$form     = get_field('shortcode-form');

?>

<section id="section-form-contact">
    <div class="container content">
        <div class="group-title">
            <?php if($surtitre): echo '<h3>'.$surtitre.'</h3>'; endif;?>
            <?php if($titre): echo $titre; endif;?>
        </div>
        <?php if($form): echo do_shortcode( $form ); endif;?>
    </div>
</section>