<?php

/**
 * Registers the `osiagniecia` post type.
 */
function osiagniecia_init() {
	register_post_type( 'osiagniecia', array(
		'labels'                => array(
			'name'                  => __( 'Osiagniecias', 'motyw' ),
			'singular_name'         => __( 'Osiagniecia', 'motyw' ),
			'all_items'             => __( 'All Osiagniecias', 'motyw' ),
			'archives'              => __( 'Osiagniecia Archives', 'motyw' ),
			'attributes'            => __( 'Osiagniecia Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into osiagniecia', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this osiagniecia', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'osiagniecia', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'osiagniecia', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'osiagniecia', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'osiagniecia', 'motyw' ),
			'filter_items_list'     => __( 'Filter osiagniecias list', 'motyw' ),
			'items_list_navigation' => __( 'Osiagniecias list navigation', 'motyw' ),
			'items_list'            => __( 'Osiagniecias list', 'motyw' ),
			'new_item'              => __( 'New Osiagniecia', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Osiagniecia', 'motyw' ),
			'edit_item'             => __( 'Edit Osiagniecia', 'motyw' ),
			'view_item'             => __( 'View Osiagniecia', 'motyw' ),
			'view_items'            => __( 'View Osiagniecias', 'motyw' ),
			'search_items'          => __( 'Search osiagniecias', 'motyw' ),
			'not_found'             => __( 'No osiagniecias found', 'motyw' ),
			'not_found_in_trash'    => __( 'No osiagniecias found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Osiagniecia:', 'motyw' ),
			'menu_name'             => __( 'Osiągnięcia', 'motyw' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', "excerpt",  'page-attributes' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'osiagniecia',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'osiagniecia_init' );

/**
 * Sets the post updated messages for the `osiagniecia` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `osiagniecia` post type.
 */
function osiagniecia_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['osiagniecia'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Osiagniecia updated. <a target="_blank" href="%s">View osiagniecia</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Osiagniecia updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Osiagniecia restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Osiagniecia published. <a href="%s">View osiagniecia</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Osiagniecia saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Osiagniecia submitted. <a target="_blank" href="%s">Preview osiagniecia</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Osiagniecia scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview osiagniecia</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Osiagniecia draft updated. <a target="_blank" href="%s">Preview osiagniecia</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'osiagniecia_updated_messages' );
