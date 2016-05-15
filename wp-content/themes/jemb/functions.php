<?php
/**
 * Main file
 */

/**
 * Initialize all the things. 
 */
// Register Custom Post Types
add_action('init', 'register_custom_posts_init');
function register_custom_posts_init() {
    // Register Latest Lines
    $lines_labels = array(
        'name'               => 'Latest Lines',
        'singular_name'      => 'Latest Line',
        'menu_name'          => 'Latest Lines'
    );
    $lines_args = array(
        'labels'             => $lines_labels,
        'public'             => true,
        'taxonomies' => array('category'), 
        'capability_type'    => 'page',
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes' )
    );
    register_post_type('lines', $lines_args);
}


add_action( 'init', 'remove_custom_post_comment' );

remove_filter('pre_user_description', 'wp_filter_kses');

function remove_custom_post_comment() {
    remove_post_type_support( 'lines', 'comments' );
}