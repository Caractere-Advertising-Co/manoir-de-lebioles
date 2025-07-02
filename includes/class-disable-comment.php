<?php
class DisableComment {
    public function __construct() {
        add_action('admin_init', [$this, 'disable_comment_admin']);
        add_filter('comments_open', '__return_false', 20, 2);
        add_filter('pings_open', '__return_false', 20, 2);
        add_filter('comments_array', '__return_empty_array', 10, 2);
        add_action('admin_menu', [$this, 'remove_comment_menu']);
        add_action('init', [$this, 'remove_admin_bar_links']);
    }

    public function disable_comment_admin() {
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
            wp_safe_redirect(admin_url());
            exit;
        }

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }

    public function remove_comment_menu() {
        remove_menu_page('edit-comments.php');
    }

    public function remove_admin_bar_links() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }
}

new DisableComment();
