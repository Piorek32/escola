<?php

/**
 * Registers the `kluby` post type.
 */
function kluby_init() {
	register_post_type( 'kluby', array(
		'labels'                => array(
			'name'                  => __( 'Klubies', 'motyw' ),
			'singular_name'         => __( 'Kluby', 'motyw' ),
			'all_items'             => __( 'Wszystkie kluby', 'motyw' ),
			'archives'              => __( 'Kluby Archives', 'motyw' ),
			'attributes'            => __( 'Kluby Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into kluby', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this kluby', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'kluby', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'kluby', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'kluby', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'kluby', 'motyw' ),
			'filter_items_list'     => __( 'Filter klubies list', 'motyw' ),
			'items_list_navigation' => __( 'Klubies list navigation', 'motyw' ),
			'items_list'            => __( 'Klubies list', 'motyw' ),
			'new_item'              => __( 'New Kluby', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Kluby', 'motyw' ),
			'edit_item'             => __( 'Edit Kluby', 'motyw' ),
			'view_item'             => __( 'View Kluby', 'motyw' ),
			'view_items'            => __( 'View Klubies', 'motyw' ),
			'search_items'          => __( 'Search klubies', 'motyw' ),
			'not_found'             => __( 'No klubies found', 'motyw' ),
			'not_found_in_trash'    => __( 'No klubies found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Kluby:', 'motyw' ),
			'menu_name'             => __( 'Kluby partnerskie', 'motyw' ),
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
		'rest_base'             => 'kluby',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'kluby_init' );

/**
 * Sets the post updated messages for the `kluby` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `kluby` post type.
 */
function kluby_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['kluby'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Kluby updated. <a target="_blank" href="%s">View kluby</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Kluby updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Kluby restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Kluby published. <a href="%s">View kluby</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Kluby saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Kluby submitted. <a target="_blank" href="%s">Preview kluby</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Kluby scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview kluby</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Kluby draft updated. <a target="_blank" href="%s">Preview kluby</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'kluby_updated_messages' );
