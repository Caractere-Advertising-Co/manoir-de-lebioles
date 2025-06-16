<?php 

// functions.php
function bdp_enable_elementor_support() {
  add_post_type_support('page', 'elementor');
}
add_action('after_setup_theme', 'bdp_enable_elementor_support');

// Forcer Elementor à utiliser un template vide propre (sans header/footer)
function bdp_elementor_blank_canvas($template) {
  if (is_page_template('page-builder.php')) {
    return locate_template('page-builder.php');
  }
  return $template;
}
add_filter('template_include', 'bdp_elementor_blank_canvas');

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

// Menu 
register_nav_menus( array(
    'megamenu' => 'Mega Menu',
	  'main' => 'Menu Principal',
	  'footer' => 'Bas de page',
    'topheader' => 'Top menu'
) );

add_theme_support( 'post-thumbnails' ); 

//SVG Files
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );
  
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
  
function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}

add_filter( 'upload_mimes', 'cc_mime_types' );
add_action( 'admin_head', 'fix_svg' );

/* Custom post type - Chambre */

function add_custom_post_chambres(){
	$labels = array(
		'name'                  => _x( 'Chambre.s', 'Post Type General Name', 'custom_post_type' ),
		'singular_name'         => _x( 'Chambre', 'Post Type Singular Name', 'custom_post_type' ),
		'menu_name'             => __( 'Chambres', 'custom_post_type' ),
		'name_admin_bar'        => __( 'Chambres', 'custom_post_type' ),
		'archives'              => __( 'Archives', 'custom_post_type' ),
		'attributes'            => __( 'Item Attributes', 'custom_post_type' ),
		'all_items'             => __( 'Toute.s', 'custom_post_type' ),
		'add_new_item'          => __( 'Ajouter une nouvelle chambre', 'custom_post_type' ),
		'add_new'               => __( 'Ajouter chambre', 'custom_post_type' ),
		'new_item'              => __( 'Nouveau', 'custom_post_type' ),
		'edit_item'             => __( 'Modifier', 'custom_post_type' ),
		'update_item'           => __( 'Mettre à jour', 'custom_post_type' ),
		'view_item'             => __( 'Voir', 'custom_post_type' ),
		'view_items'            => __( 'Voir', 'custom_post_type' ),
		'search_items'          => __( 'Recherche', 'custom_post_type' ),
		'not_found'             => __( 'Non trouvé', 'custom_post_type' ),
		'not_found_in_trash'    => __( 'Non trouvé', 'custom_post_type' ),
		'featured_image'        => __( 'Miniature', 'custom_post_type' ),
		'set_featured_image'    => __( 'Définir la miniature', 'custom_post_type' ),
		'remove_featured_image' => __( 'Retirer la miniature', 'custom_post_type' ),
		'use_featured_image'    => __( 'Utiliser comme miniature', 'custom_post_type' ),
		'insert_into_item'      => __( 'Insérer', 'custom_post_type' ),
		'uploaded_to_this_item' => __( 'Uploader', 'custom_post_type' ),
		'items_list'            => __( 'List', 'custom_post_type' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom_post_type' ),
		'filter_items_list'     => __( 'Filtrer', 'custom_post_type' ),
	);
	$args = array(
		'label'                 => __( 'Chambres', 'custom_post_type' ),
		'description'           => __( 'Galerie chambrek', 'custom_post_type' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'chambre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-feedback',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'supports'				=> array('title', 'revisions', 'author', 'thumbnail'),
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'		=> 'post',
	);
	register_post_type( 'chambres', $args );
}
add_action( 'init', 'add_custom_post_chambres', 0 );


add_action('rest_api_init', function () {
  register_rest_route('manoir/v1', '/galerie/(?P<id>\d+)', [
    'methods' => 'GET',
    'callback' => 'get_chambre_gallery',
    'permission_callback' => '__return_true',
  ]);
});

function get_chambre_gallery($data) {
  $post_id = $data['id'];
  $gallery = get_field('galerie-chambre', $post_id);
  if (!$gallery) return [];

  // On ne retourne que les infos nécessaires
  return array_map(function($img) {
    return [
      'url' => $img['url'],
      'alt' => $img['alt'],
      'title' => $img['title']
    ];
  }, $gallery);
}


/* Formulaire BREVO x API */

add_action('wp_ajax_nopriv_bdp_brevo_add_contact', 'bdp_brevo_add_contact');
add_action('wp_ajax_bdp_brevo_add_contact', 'bdp_brevo_add_contact');

function bdp_brevo_add_contact() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data['email']) || !is_email($data['email'])) {
        wp_send_json_error('Email invalide', 400);
    }
    $email = sanitize_email($data['email']);

    $payload = [
        'email' => 'benoit@caractere-advertising.be',
        'listIds' => [10], // ID de ta liste
        'updateEnabled' => true,
    ];
    $response = wp_remote_post('https://api.brevo.com/v3/contacts', [
        'headers' => [
            'Content-Type' => 'application/json',
            'accept' => 'application/json',
            'api-key' => BREVO_API_KEY,
        ],
        'body' => json_encode($payload),
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message(), 500);
    }
    $code = wp_remote_retrieve_response_code($response);
    if ($code >= 200 && $code < 300) {
        wp_send_json_success();
    } else {
        wp_send_json_error(wp_remote_retrieve_body($response), $code);
    }
}
