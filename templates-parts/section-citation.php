<?php 

$titreCitation = get_field('titre_citation','options');

?>

<section id="citation">
    <div class="container text-center m-auto">
        <?php if($titreCitation): echo $titreCitation; endif;?>
    </div>
</section>