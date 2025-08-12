<?php

$args = array(
    'post_type' => 'faq',
    'posts_per_page'=> -1,
    'post_statut' => 'publish'
);

$query = new WP_Query( $args );
$taxonomies = get_object_taxonomies( 'faq', 'objects' );

$all_terms = [];
foreach( $taxonomies as $taxonomy ) {
    $terms = get_terms( [
        'taxonomy' => $taxonomy->name,
        'hide_empty' => false // garde aussi les termes sans article
    ] );
    if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
        $all_terms[ $taxonomy->name ] = $terms;
    }
}
?>

<section id="section-faq" class="builder">
    <div class="container content">
        <div class="filter-faqs">
            <div class="filter-item active" data-filter="*">Tous</div>

            <?php 
            if ( ! empty( $all_terms ) ) :
                foreach ( $all_terms as $tax_name => $terms ) :
                    foreach ( $terms as $term ) :
                        echo '<div class="filter-item" data-filter=".' . esc_attr( $term->slug ) . '">'. esc_html( $term->name ) . '</div>';
                    endforeach;
                endforeach;
            endif;
            ?>
        </div>

        <div class="listing-faqs faqs-builder">
            <?php if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();

                    // Récupérer les termes liés à ce post
                    $post_terms_classes = [];
                    foreach ( $taxonomies as $taxonomy ) {
                        $terms = wp_get_post_terms( get_the_ID(), $taxonomy->name );
                        foreach ( $terms as $term ) {
                            $post_terms_classes[] = $term->slug; // pour data-filter
                        }
                    }

                    $classes = implode( ' ', $post_terms_classes );

                    echo '<div class="faq-item * ' . esc_attr( $classes ) . '">';
                    echo '<div class="toggle-btn accordion"><h3>' . get_the_title() . '</h3></div>';
                    echo '<div class="toggle-content panel"><p>' . get_the_content() . '</p></div>';
                    echo '</div>';

                endwhile;
            endif;
            wp_reset_postdata();?>
        </div>
    </div>
</section>