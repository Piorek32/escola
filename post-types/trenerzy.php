<?php

/**
 * Registers the `trenerzy` post type.
 */
function trenerzy_init() {
	register_post_type( 'trenerzy', array(
		'labels'                => array(
			'name'                  => __( 'Trenerzies', 'motyw' ),
			'singular_name'         => __( 'Trenerzy', 'motyw' ),
			'all_items'             => __( 'All Trenerzies', 'motyw' ),
			'archives'              => __( 'Trenerzy Archives', 'motyw' ),
			'attributes'            => __( 'Trenerzy Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into trenerzy', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this trenerzy', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'trenerzy', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'trenerzy', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'trenerzy', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'trenerzy', 'motyw' ),
			'filter_items_list'     => __( 'Filter trenerzies list', 'motyw' ),
			'items_list_navigation' => __( 'Trenerzies list navigation', 'motyw' ),
			'items_list'            => __( 'Trenerzies list', 'motyw' ),
			'new_item'              => __( 'New Trenerzy', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Trenerzy', 'motyw' ),
			'edit_item'             => __( 'Edit Trenerzy', 'motyw' ),
			'view_item'             => __( 'View Trenerzy', 'motyw' ),
			'view_items'            => __( 'View Trenerzies', 'motyw' ),
			'search_items'          => __( 'Search trenerzies', 'motyw' ),
			'not_found'             => __( 'No trenerzies found', 'motyw' ),
			'not_found_in_trash'    => __( 'No trenerzies found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Trenerzy:', 'motyw' ),
			'menu_name'             => __( 'Trenerzies', 'motyw' ),
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
		'rest_base'             => 'trenerzy',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'trenerzy_init' );

/**
 * Sets the post updated messages for the `trenerzy` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `trenerzy` post type.
 */
function trenerzy_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['trenerzy'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Trenerzy updated. <a target="_blank" href="%s">View trenerzy</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Trenerzy updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Trenerzy restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Trenerzy published. <a href="%s">View trenerzy</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Trenerzy saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Trenerzy submitted. <a target="_blank" href="%s">Preview trenerzy</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Trenerzy scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview trenerzy</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Trenerzy draft updated. <a target="_blank" href="%s">Preview trenerzy</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'trenerzy_updated_messages' );
