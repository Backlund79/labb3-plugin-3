<?php
/**
 * Register a custom post type called "Submissions".
 *
 * @see get_post_type_labels() for label keys.
 */
function post_submissions()
{
    $labels = array(
        'name'                  => _x('Submissions', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Submission', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Submissions', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Submission', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Submission', 'textdomain'),
        'new_item'              => __('New Submission', 'textdomain'),
        'edit_item'             => __('Edit Submission', 'textdomain'),
        'view_item'             => __('View Submission', 'textdomain'),
        'all_items'             => __('All Submissions', 'textdomain'),
        'search_items'          => __('Search submissions', 'textdomain'),
        'parent_item_colon'     => __('Parent submissions:', 'textdomain'),
        'not_found'             => __('No submissions found.', 'textdomain'),
        'not_found_in_trash'    => __('No submissions found in Trash.', 'textdomain'),
        
        
        'archives'              => _x('Submission archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into submissions', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this submissions', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter submissions list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Submissions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Submissions list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'excerpt', 'comments' ),
    );
 
    register_post_type('submissions', $args);
}
 
add_action('init', 'post_submissions');
