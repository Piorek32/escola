<?php

/**
 * Registers the `cooperation` post type.
 */
function cooperation_init() {
	register_post_type( 'cooperation', array(
		'labels'                => array(
			'name'                  => __( 'Cooperations', 'motyw' ),
			'singular_name'         => __( 'Cooperation', 'motyw' ),
			'all_items'             => __( 'All Cooperations', 'motyw' ),
			'archives'              => __( 'Cooperation Archives', 'motyw' ),
			'attributes'            => __( 'Cooperation Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into cooperation', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this cooperation', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'cooperation', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'cooperation', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'cooperation', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'cooperation', 'motyw' ),
			'filter_items_list'     => __( 'Filter cooperations list', 'motyw' ),
			'items_list_navigation' => __( 'Cooperations list navigation', 'motyw' ),
			'items_list'            => __( 'Cooperations list', 'motyw' ),
			'new_item'              => __( 'New Cooperation', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Cooperation', 'motyw' ),
			'edit_item'             => __( 'Edit Cooperation', 'motyw' ),
			'view_item'             => __( 'View Cooperation', 'motyw' ),
			'view_items'            => __( 'View Cooperations', 'motyw' ),
			'search_items'          => __( 'Search cooperations', 'motyw' ),
			'not_found'             => __( 'No cooperations found', 'motyw' ),
			'not_found_in_trash'    => __( 'No cooperations found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Cooperation:', 'motyw' ),
			'menu_name'             => __( 'Współpraca', 'motyw' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', "excerpt" ),

		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'cooperation',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'cooperation_init' );

/**
 * Sets the post updated messages for the `cooperation` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `cooperation` post type.
 */
function cooperation_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['cooperation'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Cooperation updated. <a target="_blank" href="%s">View cooperation</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Cooperation updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Cooperation restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Cooperation published. <a href="%s">View cooperation</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Cooperation saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Cooperation submitted. <a target="_blank" href="%s">Preview cooperation</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Cooperation scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview cooperation</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Cooperation draft updated. <a target="_blank" href="%s">Preview cooperation</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'cooperation_updated_messages' );
