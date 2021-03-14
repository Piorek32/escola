<?php

/**
 * Registers the `buildings` post type.
 */
function buildings_init() {
	register_post_type( 'buildings', array(
		'labels'                => array(
			'name'                  => __( 'Buildings', 'motyw' ),
			'singular_name'         => __( 'Buildings', 'motyw' ),
			'all_items'             => __( 'All Buildings', 'motyw' ),
			'archives'              => __( 'Buildings Archives', 'motyw' ),
			'attributes'            => __( 'Buildings Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into buildings', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this buildings', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'buildings', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'buildings', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'buildings', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'buildings', 'motyw' ),
			'filter_items_list'     => __( 'Filter buildings list', 'motyw' ),
			'items_list_navigation' => __( 'Buildings list navigation', 'motyw' ),
			'items_list'            => __( 'Buildings list', 'motyw' ),
			'new_item'              => __( 'New Buildings', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Buildings', 'motyw' ),
			'edit_item'             => __( 'Edit Buildings', 'motyw' ),
			'view_item'             => __( 'View Buildings', 'motyw' ),
			'view_items'            => __( 'View Buildings', 'motyw' ),
			'search_items'          => __( 'Search buildings', 'motyw' ),
			'not_found'             => __( 'No buildings found', 'motyw' ),
			'not_found_in_trash'    => __( 'No buildings found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Buildings:', 'motyw' ),
			'menu_name'             => __( 'Buildings', 'motyw' ),
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
		'rest_base'             => 'buildings',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'buildings_init' );

/**
 * Sets the post updated messages for the `buildings` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `buildings` post type.
 */
function buildings_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['buildings'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Buildings updated. <a target="_blank" href="%s">View buildings</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Buildings updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Buildings restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Buildings published. <a href="%s">View buildings</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Buildings saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Buildings submitted. <a target="_blank" href="%s">Preview buildings</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Buildings scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview buildings</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Buildings draft updated. <a target="_blank" href="%s">Preview buildings</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'buildings_updated_messages' );
