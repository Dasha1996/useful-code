<?php /*Custom Post type start*/
function cw_post_type_testimonials() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	$labels = array(
	'name' => _x('testimonials', 'plural'),
	'singular_name' => _x('testimonials', 'singular'),
	'menu_name' => _x('testimonials', 'admin menu'),
	'name_admin_bar' => _x('testimonials', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New testimonials'),
	'new_item' => __('New testimonials'),
	'edit_item' => __('Edit testimonials'),
	'view_item' => __('View testimonials'),
	'all_items' => __('All testimonials'),
	'search_items' => __('Search testimonials'),
	'not_found' => __('No testimonials found.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'testimonials'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('testimonials', $args);
	}
	add_action('init', 'cw_post_type_testimonials');
	/*Custom Post type end*/