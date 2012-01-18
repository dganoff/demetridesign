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
    'before_widget' => '<div class="sidebar-module">',  
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
		'name' => _x('Resources', 'post type general name'),
		'singular_name' => _x('Resource', 'post type singular name'),
		'add_new' => _x('Add New', 'Resource'),
		'add_new_item' => __('Add New Resource'),
		'edit_item' => __('Edit Resource'),
		'new_item' => __('New Resource'),
		'view_item' => __('View Resource '),
		'search_items' => __('Search Resources'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	$args = array(
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 5, // Appear right below "Posts"
		'has_archive' => 'resources', // Activate the archive
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
	);
	register_post_type( 'resource', $args ); // Create the post type, use options above
}

// add custom taxonomies:

	// presenters:
$labels_presenter = array(
	'name' => _x( 'Presenters', 'taxonomy general name' ),
	'singular_name' => _x( 'Presenter', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Presenters' ),
	'popular_items' => __( 'Popular Presenters' ),
	'all_items' => __( 'All Presenters' ),
	'edit_item' => __( 'Edit Presenter' ),
	'update_item' => __( 'Update Presenter' ),
	'add_new_item' => __( 'Add New Presenter' ),
	'new_item_name' => __( 'New Presenter Name' ),
	'separate_items_with_commas' => __( 'Separate presenters with commas' ),
	'add_or_remove_items' => __( 'Add or remove presenters' ),
	'choose_from_most_used' => __( 'Choose from the most used presenters' )
);

register_taxonomy(
	'presenters', // The name of the custom taxonomy
	array( 'resource' ), // Associate it with our custom post type
	array(
		'rewrite' => array( // Use "presenter" instead of "presenters" in the permalink
			'slug' => 'presenter'
			),
		'labels' => $labels_presenter
		)
);

	// topics:
$labels_topics = array(
	'name' => _x( 'Topics', 'taxonomy general name' ),
	'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Topics' ),
	'all_items' => __( 'All Topics' ),
	'parent_item' => __( 'Parent Topic' ),
	'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Edit Topic' ),
	'update_item' => __( 'Update Topic' ),
	'add_new_item' => __( 'Add New Topic' ),
	'new_item_name' => __( 'New Topic Name' ),
);

register_taxonomy(
	'topics', // The name of the custom taxonomy
	array( 'resource' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'topic', // Use "topic" instead of "topics" in permalinks
			'hierarchical' => true // Allows sub-topics to appear in permalinks
			),
		'labels' => $labels_topics
		)
);


?>