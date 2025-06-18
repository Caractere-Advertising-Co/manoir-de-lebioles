<?php 

class CPT_FAQ {
    public static function register() {
        $labels = array(
            'name' => _x('FAQs', 'Post Type General Name', 'custom_post_type'),
            'singular_name' => _x('FAQ', 'Post Type Singular Name', 'custom_post_type'),
            'menu_name' => __('FAQs', 'custom_post_type'),
            'name_admin_bar' => __('FAQ', 'custom_post_type'),
            'add_new' => __('Ajouter FAQ', 'custom_post_type'),
            'add_new_item' => __('Ajouter une nouvelle FAQ', 'custom_post_type'),
            'new_item' => __('Nouveau', 'custom_post_type'),
            'edit_item' => __('Modifier', 'custom_post_type'),
            'view_item' => __('Voir', 'custom_post_type'),
            'all_items' => __('Toutes les FAQs', 'custom_post_type'),
            'search_items' => __('Recherche', 'custom_post_type'),
            'not_found' => __('Non trouvé', 'custom_post_type'),
        );

        $args = array(
            'label' => __('FAQ', 'custom_post_type'),
            'description' => __('Foire aux questions', 'custom_post_type'),
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-editor-help',
            'supports' => array('title', 'editor', 'revisions'),
        );

        register_post_type('faq', $args);
    }
}

add_action('init', ['CPT_FAQ', 'register']);?>