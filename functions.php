<?php

// ======== Core Setup ========

// Load CPT classes
require_once get_template_directory() . '/includes/class-cpt-chambres.php';
require_once get_template_directory() . '/includes/class-cpt-faq.php';
require_once get_template_directory() . '/includes/class-cpt-jobs.php';
require_once get_template_directory() . '/includes/class-disable-comment.php';

// Enable Elementor support for pages

add_action('after_setup_theme', function() {
    add_post_type_support('page', 'elementor');
});

// Use custom Elementor template
add_filter('template_include', function($template) {
    if (is_page_template('page-builder.php')) {
        return locate_template('page-builder.php');
    }
    return $template;
});

// Avoid PHP shutdown output buffer mess
remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// ======== Theme Features ========

add_theme_support('post-thumbnails');

register_nav_menus([
    'megamenu' => 'Mega Menu',
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
    'topheader' => 'Top menu'
]);

// ======== SVG Upload Support ========

add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ($wp_version !== '4.7.1') return $data;
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

add_action('admin_head', function() {
    echo '<style>.attachment-266x266, .thumbnail img { width: 100% !important; height: auto !important; }</style>';
});

// ======== API: Galerie Chambre ========

add_action('rest_api_init', function() {
    register_rest_route('manoir/v1', '/galerie/(?P<id>\d+)', [
        'methods' => 'GET',
        'callback' => function($data) {
            $post_id = $data['id'];
            $gallery = get_field('galerie-chambre', $post_id);
            if (!$gallery) return [];
            return array_map(function($img) {
                return [
                    'url' => $img['url'],
                    'alt' => $img['alt'],
                    'title' => $img['title']
                ];
            }, $gallery);
        },
        'permission_callback' => '__return_true',
    ]);
});

// ======== AJAX: Brevo Form ========

add_action('wp_ajax_nopriv_bdp_brevo_add_contact', 'bdp_brevo_add_contact');
add_action('wp_ajax_bdp_brevo_add_contact', 'bdp_brevo_add_contact');

function bdp_brevo_add_contact() {
    if (empty($_POST['email']) || !is_email($_POST['email'])) {
        wp_send_json_error('Email invalide', 400);
    }

    $email = sanitize_email($_POST['email']);

    $payload = [
        'email' => $email,
        'listIds' => [10],
        'updateEnabled' => true,
        'attributes' => [ 'ORIGINE' => 'API WordPress' ]
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
        wp_send_json_error('Erreur API: ' . $response->get_error_message(), 500);
    }

    $status = wp_remote_retrieve_response_code($response);
    if ($status >= 200 && $status < 300) {
        wp_send_json_success();
    } else {
        wp_send_json_error('Erreur Brevo: ' . wp_remote_retrieve_body($response), $status);
    }
}
