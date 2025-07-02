<?php 

class CPT_JOBS {
    public static function register() {
        $labels = array(
            'name' => _x('Jobs', 'Post Type General Name', 'custom_post_type'),
            'singular_name' => _x('Job', 'Post Type Singular Name', 'custom_post_type'),
            'menu_name' => __('Jobs', 'custom_post_type'),
            'name_admin_bar' => __('Job', 'custom_post_type'),
            'add_new' => __('Ajouter Job', 'custom_post_type'),
            'add_new_item' => __('Ajouter une nouvelle Job', 'custom_post_type'),
            'new_item' => __('Nouveau', 'custom_post_type'),
            'edit_item' => __('Modifier', 'custom_post_type'),
            'view_item' => __('Voir', 'custom_post_type'),
            'all_items' => __('Toutes les Jobs', 'custom_post_type'),
            'search_items' => __('Recherche', 'custom_post_type'),
            'not_found' => __('Non trouvé', 'custom_post_type'),
        );

        $args = array(
            'label' => __('Jobs', 'custom_post_type'),
            'description' => __('Poste à pourvoir', 'custom_post_type'),
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-search',
            'supports' => array('title', 'editor', 'revisions'),
        );

        register_post_type('jobs', $args);
    }
}

add_action('init', ['CPT_JOBS', 'register']);?>