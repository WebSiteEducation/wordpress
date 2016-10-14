<?php


add_action( 'init', 'register_cpt_Portfolio' );

function register_cpt_Portfolio() {
    
    $labels = array( 
        'name' => __( 'Portfolio', 'brizzz' ),
        'singular_name' => __( 'Portfolio', 'brizzz' ),
        'add_new' => __( 'Add New Portfolio', 'brizzz' ),
        'add_new_item' => __( 'Add New Portfolio', 'brizzz' ),
        'edit_item' => __( 'Edit Portfolio', 'brizzz' ),
        'new_item' => __( 'New Portfolio', 'brizzz' ),
        'view_item' => __( 'View Portfolio', 'brizzz' ),
        'search_items' => __( 'Search Portfolios', 'brizzz' ),
        'not_found' => __( 'No Portfolios found', 'brizzz' ),
        'not_found_in_trash' => __( 'No Portfolios found in Trash', 'brizzz' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'brizzz' ),
        'menu_name' => __( 'Portfolio', 'brizzz' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'Portfolio_category','Categories','Tags' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_stylesheet_directory_uri(). '/images/admin_ico.png', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Portfolio', $args );
}
add_action( 'init', 'create_Categories_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Categories', 'brizzz' ),
    'singular_name' => __( 'Categories', 'brizzz' ),
    'search_items' =>  __( 'Search Categories','brizzz' ),
    'all_items' => __( 'All Categories','brizzz' ),
    'parent_item' => __( 'Parent Categories','brizzz' ),
    'parent_item_colon' => __( 'Parent Categories:','brizzz' ),
    'edit_item' => __( 'Edit Categories','brizzz' ), 
    'update_item' => __( 'Update Categories','brizzz' ),
    'add_new_item' => __( 'Add New Categories','brizzz' ),
    'new_item_name' => __( 'New Categories Name','brizzz' ),
    'menu_name' => __( 'Categories','brizzz' ),
  );     

// Now register the taxonomy

  register_taxonomy('Categories',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));

}
add_action( 'init', 'create_Tags_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Tags_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Tags', 'brizzz' ),
    'singular_name' => __( 'Tags', 'brizzz' ),
    'search_items' =>  __( 'Search Tags','brizzz' ),
    'all_items' => __( 'All Tags','brizzz' ),
    'parent_item' => __( 'Parent Tags','brizzz' ),
    'parent_item_colon' => __( 'Parent Tags:','brizzz' ),
    'edit_item' => __( 'Edit Tags','brizzz' ), 
    'update_item' => __( 'Update Tags','brizzz' ),
    'add_new_item' => __( 'Add New Tags','brizzz' ),
    'new_item_name' => __( 'New Tags Name','brizzz' ),
    'menu_name' => __( 'Tags','brizzz' ),
  );     

// Now register the taxonomy

  register_taxonomy('Tags',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Tags' ),
  ));

}
?>