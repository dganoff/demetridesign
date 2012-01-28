<?php

// Limit the # of words in the excerpt
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

// Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Continue Reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*******************************
 MENUS SUPPORT
********************************/
if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'main-menu' => __( 'Main Menu' )
				)
			);
		}
	}
}

///////////////////////////////////
// register the sidebar formatting:
///////////////////////////////////
if ( function_exists('register_sidebar') )
    register_sidebar(array(  
    'name' => 'sidebar',  
    'before_widget' => '<div class="sidebar-module %2$s">',  
    'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>'
));

if ( function_exists('register_sidebar') )  
    register_sidebar(array(  
    'name' => 'footer',  
    'before_widget' => '<nav>',  
    'after_widget' => '</nav>',  
    'before_title' => '<h1>',  
    'after_title' => '</h1>'
));
// !end register sidebar formatting

///////////////////////////////////
// Create custom post type:
///////////////////////////////////

add_action('init', 'register_rc', 1); // Set priority to avoid plugin conflicts

function register_rc() { // A unique name for our function
 	$labels = array( // Used in the WordPress admin
		'name' => _x('Works', 'post type general name'),
		'singular_name' => _x('Work', 'post type singular name'),
		'add_new' => _x('Add New', 'Work'),
		'add_new_item' => __('Add New Work'),
		'edit_item' => __('Edit Work'),
		'new_item' => __('New Work'),
		'view_item' => __('View Work '),
		'search_items' => __('Search Works'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	$args = array(
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 5, // Appear right below "Posts"
		'has_archive' => 'works', // Activate the archive
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
	);
	register_post_type( 'work', $args ); // Create the post type, use options above
}

// add custom taxonomies:

	// clients:
$labels_client = array(
	'name' => _x( 'Clients', 'taxonomy general name' ),
	'singular_name' => _x( 'Client', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Clients' ),
	'popular_items' => __( 'Popular Clients' ),
	'all_items' => __( 'All Clients' ),
	'edit_item' => __( 'Edit Client' ),
	'update_item' => __( 'Update Client' ),
	'add_new_item' => __( 'Add New Client' ),
	'new_item_name' => __( 'New Client Name' ),
	'separate_items_with_commas' => __( 'Separate clients with commas' ),
	'add_or_remove_items' => __( 'Add or remove clients' ),
	'choose_from_most_used' => __( 'Choose from the most used clients' )
);

register_taxonomy(
	'clients', // The name of the custom taxonomy
	array( 'work' ), // Associate it with our custom post type
	array(
		'rewrite' => array( // Use "client" instead of "clients" in the permalink
			'slug' => 'client'
			),
		'labels' => $labels_client
		)
);

	// technologys:
$labels_technologies = array(
	'name' => _x( 'Technologies', 'taxonomy general name' ),
	'singular_name' => _x( 'Technology', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Technologies' ),
	'all_items' => __( 'All Technologies' ),
	'parent_item' => __( 'Parent Technology' ),
	'parent_item_colon' => __( 'Parent Technology:' ),
	'edit_item' => __( 'Edit Technology' ),
	'update_item' => __( 'Update Technology' ),
	'add_new_item' => __( 'Add New Technology' ),
	'new_item_name' => __( 'New Technology Name' ),
);

register_taxonomy(
	'technology', // The name of the custom taxonomy
	array( 'work' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'technology', // Use "technology" instead of "technologys" in permalinks
			'hierarchical' => true // Allows sub-technologys to appear in permalinks
			),
		'labels' => $labels_technologies
		)
);


?>