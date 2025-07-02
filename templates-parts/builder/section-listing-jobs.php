<?php 

$args = array(
    'post_type' => 'jobs',
    'post_statut' => 'publish',
    'post_per_page' => -1
);

$query = new WP_query($args);

?>

<section id="listing-jobs">
    <div class="container content grid">
        <?php if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            // Variables
            $lien = get_the_permalink();
            $title = get_the_title();
        ?>
        
        <a href="<?php echo $lien;?>"><?php echo $title;?></a>

        <?php endwhile; endif;?>
    </div>
</section>