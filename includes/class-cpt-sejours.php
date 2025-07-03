<?php 

class CPT_Sejours {
    public static function register() {
        $labels = array(
            'name' => _x('Séjour.s', 'Post Type General Name', 'custom_post_type'),
            'singular_name' => _x('Séjour', 'Post Type Singular Name', 'custom_post_type'),
            'menu_name' => __('Séjours', 'custom_post_type'),
            'name_admin_bar' => __('Séjours', 'custom_post_type'),
            'add_new' => __('Ajouter séjour', 'custom_post_type'),
            'add_new_item' => __('Ajouter une nouvelle séjour', 'custom_post_type'),
            'new_item' => __('Nouveau', 'custom_post_type'),
            'edit_item' => __('Modifier', 'custom_post_type'),
            'view_item' => __('Voir', 'custom_post_type'),
            'all_items' => __('Toutes les séjours', 'custom_post_type'),
            'search_items' => __('Recherche', 'custom_post_type'),
            'not_found' => __('Non trouvé', 'custom_post_type'),
        );

        $args = array(
            'label' => __('Séjours', 'custom_post_type'),
            'description' => __('Galerie séjour', 'custom_post_type'),
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-schedule',
            'supports' => array('title', 'revisions', 'author', 'thumbnail'),
        );

        register_post_type('sejours', $args);
    }
}

add_action('init', ['CPT_Sejours', 'register']);

?>