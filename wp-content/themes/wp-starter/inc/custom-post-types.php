<?php
/* Create Post Types */
add_action( 'init', 'create_post_types' );
function create_post_types() {

	/* Events */
	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => 'Events',
				'singular_name' => 'Event',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Event',
				'edit' => 'Edit',
				'edit_item' => 'Edit Event',
				'new_item' => 'New Event',
				'view' => 'View Event',
				'view_item' => 'View Event',
				'search_items' => 'Search Events',
				'not_found' => 'No Events Found',
				'not_found_in_trash' => 'No Events Found in Trash',
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'yarpp_support' => true,
		)
	);

	register_taxonomy( 'event_category', 'event',
		array(
			'labels' => array(
				'name' => 'Event Categories',
				'singular_name' => 'Event Category',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Event Category',
				'edit' => 'Edit',
			),
			'rewrite' => array( 'slug' => 'events' ),
			'hierarchical' => true,
		)
	);


	/* Works */
	register_post_type( 'work',
		array(
			'labels' => array(
				'name' => 'Works',
				'singular_name' => 'Work',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Work',
				'edit' => 'Edit',
				'edit_item' => 'Edit Work',
				'new_item' => 'New Work',
				'view' => 'View Work',
				'view_item' => 'View Work',
				'search_items' => 'Search Works',
				'not_found' => 'No Works Found',
				'not_found_in_trash' => 'No Works Found in Trash',
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'yarpp_support' => true,
		)
	);

	register_taxonomy( 'work_category', 'work',
		array(
			'labels' => array(
				'name' => 'Work Categories',
				'singular_name' => 'Work Category',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Work Category',
				'edit' => 'Edit',
			),
			'rewrite' => array( 'slug' => 'gallery' ),
			'hierarchical' => true,
		)
	);


	/* Venues */
	register_post_type( 'venue',
		array(
			'labels' => array(
				'name' => 'Venues',
				'singular_name' => 'Venue',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Venue',
				'edit' => 'Edit',
				'edit_item' => 'Edit Venue',
				'new_item' => 'New Venue',
				'view' => 'View Venue',
				'view_item' => 'View Venue',
				'search_items' => 'Search Venues',
				'not_found' => 'No Venues Found',
				'not_found_in_trash' => 'No Venues Found in Trash',
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'yarpp_support' => true,
		)
	);

	register_taxonomy( 'venue_category', 'venue',
		array(
			'labels' => array(
				'name' => 'Venue Categories',
				'singular_name' => 'Venue Category',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Venue Category',
				'edit' => 'Edit',
			),
			'rewrite' => array( 'slug' => 'venues' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy( 'venue_size', 'venue',
		array(
			'labels' => array(
				'name' => 'Venue Sizes',
				'singular_name' => 'Venue Size',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Venue Size',
				'edit' => 'Edit',
			),
			'hierarchical' => true,
		)
	);
	register_taxonomy( 'venue_location', 'venue',
		array(
			'labels' => array(
				'name' => 'Venue Locations',
				'singular_name' => 'Venue Location',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Venue Location',
				'edit' => 'Edit',
			),
			'hierarchical' => true,
		)
	);


	/* Resources */
	register_post_type( 'resource',
		array(
			'labels' => array(
				'name' => 'Resources',
				'singular_name' => 'Resource',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Resource',
				'edit' => 'Edit',
				'edit_item' => 'Edit Resource',
				'new_item' => 'New Resource',
				'view' => 'View Resource',
				'view_item' => 'View Resource',
				'search_items' => 'Search Resources',
				'not_found' => 'No Resources Found',
				'not_found_in_trash' => 'No Resources Found in Trash',
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'yarpp_support' => true,
		)
	);

}
?>