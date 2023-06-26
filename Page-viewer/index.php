<?php
/**
* Plugin Name: Page-viewer
* Plugin URI: http://localhost/word2/
* Description: Test.
* Version: 0.1
* Author: Jaimil
* Author URI: http://localhost/word2/
**/

function pvc_track_post_views() {
    if (is_singular('post')) {
        global $post;
        $views = get_post_meta($post->ID, 'post_views', true);
        $views = ($views === '') ? 1 : intval($views) + 1;
        update_post_meta($post->ID, 'post_views', $views);
    }
}
add_action('wp_head', 'pvc_track_post_views');

function pvc_display_post_views($atts) {
    global $post;
    $views = get_post_meta($post->ID, 'post_views', true);
    return ($views === '') ? '0' : $views;
}
add_shortcode('post_views', 'pvc_display_post_views');
?>