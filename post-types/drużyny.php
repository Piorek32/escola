<?php

/**
 * Registers the `drużyny` post type.
 */
function drużyny_init() {
	register_post_type( 'drużyny', array(
		'labels'                => array(
			'name'                  => __( 'Drużynies', 'motyw' ),
			'singular_name'         => __( 'Drużyny', 'motyw' ),
			'all_items'             => __( 'Wszystkie drużyny', 'motyw' ),
			'archives'              => __( 'Drużyny Archives', 'motyw' ),
			'attributes'            => __( 'Drużyny Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into drużyny', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this drużyny', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'drużyny', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'drużyny', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'drużyny', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'drużyny', 'motyw' ),
			'filter_items_list'     => __( 'Filter drużynies list', 'motyw' ),
			'items_list_navigation' => __( 'Drużynies list navigation', 'motyw' ),
			'items_list'            => __( 'Drużynies list', 'motyw' ),
			'new_item'              => __( 'New Drużyny', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Drużyny', 'motyw' ),
			'edit_item'             => __( 'Edit Drużyny', 'motyw' ),
			'view_item'             => __( 'View Drużyny', 'motyw' ),
			'view_items'            => __( 'View Drużynies', 'motyw' ),
			'search_items'          => __( 'Search drużynies', 'motyw' ),
			'not_found'             => __( 'No drużynies found', 'motyw' ),
			'not_found_in_trash'    => __( 'No drużynies found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Drużyny:', 'motyw' ),
			'menu_name'             => __( 'Drużyny', 'motyw' ),
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
		'rest_base'             => 'drużyny',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'drużyny_init' );

/**
 * Sets the post updated messages for the `drużyny` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `drużyny` post type.
 */
function drużyny_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['drużyny'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Drużyny updated. <a target="_blank" href="%s">View drużyny</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Drużyny updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Drużyny restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Drużyny published. <a href="%s">View drużyny</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Drużyny saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Drużyny submitted. <a target="_blank" href="%s">Preview drużyny</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Drużyny scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview drużyny</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Drużyny draft updated. <a target="_blank" href="%s">Preview drużyny</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'drużyny_updated_messages' );
