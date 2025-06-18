<?php 

class CPT_Chambres {
    public static function register() {
        $labels = array(
            'name' => _x('Chambre.s', 'Post Type General Name', 'custom_post_type'),
            'singular_name' => _x('Chambre', 'Post Type Singular Name', 'custom_post_type'),
            'menu_name' => __('Chambres', 'custom_post_type'),
            'name_admin_bar' => __('Chambres', 'custom_post_type'),
            'add_new' => __('Ajouter chambre', 'custom_post_type'),
            'add_new_item' => __('Ajouter une nouvelle chambre', 'custom_post_type'),
            'new_item' => __('Nouveau', 'custom_post_type'),
            'edit_item' => __('Modifier', 'custom_post_type'),
            'view_item' => __('Voir', 'custom_post_type'),
            'all_items' => __('Toutes les chambres', 'custom_post_type'),
            'search_items' => __('Recherche', 'custom_post_type'),
            'not_found' => __('Non trouvé', 'custom_post_type'),
        );

        $args = array(
            'label' => __('Chambres', 'custom_post_type'),
            'description' => __('Galerie chambre', 'custom_post_type'),
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-feedback',
            'supports' => array('title', 'revisions', 'author', 'thumbnail'),
        );

        register_post_type('chambres', $args);
    }
}

add_action('init', ['CPT_Chambres', 'register']);

?>