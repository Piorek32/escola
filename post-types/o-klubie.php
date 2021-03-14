<?php

/**
 * Registers the `o_klubie` post type.
 */
function o_klubie_init() {
	register_post_type( 'o-klubie', array(
		'labels'                => array(
			'name'                  => __( 'O klubies', 'motyw' ),
			'singular_name'         => __( 'O klubie', 'motyw' ),
			'all_items'             => __( 'Wszystkie o klubie', 'motyw' ),
			'archives'              => __( 'O klubie Archives', 'motyw' ),
			'attributes'            => __( 'O klubie Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into o klubie', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this o klubie', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'o-klubie', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'o-klubie', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'o-klubie', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'o-klubie', 'motyw' ),
			'filter_items_list'     => __( 'Filter o klubies list', 'motyw' ),
			'items_list_navigation' => __( 'O klubies list navigation', 'motyw' ),
			'items_list'            => __( 'O klubies list', 'motyw' ),
			'new_item'              => __( 'New O klubie', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New O klubie', 'motyw' ),
			'edit_item'             => __( 'Edit O klubie', 'motyw' ),
			'view_item'             => __( 'View O klubie', 'motyw' ),
			'view_items'            => __( 'View O klubies', 'motyw' ),
			'search_items'          => __( 'Search o klubies', 'motyw' ),
			'not_found'             => __( 'No o klubies found', 'motyw' ),
			'not_found_in_trash'    => __( 'No o klubies found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent O klubie:', 'motyw' ),
			'menu_name'             => __( 'O klubie', 'motyw' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'o-klubie',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'o_klubie_init' );

/**
 * Sets the post updated messages for the `o_klubie` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `o_klubie` post type.
 */
function o_klubie_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['o-klubie'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'O klubie updated. <a target="_blank" href="%s">View o klubie</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'O klubie updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'O klubie restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'O klubie published. <a href="%s">View o klubie</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'O klubie saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'O klubie submitted. <a target="_blank" href="%s">Preview o klubie</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'O klubie scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview o klubie</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'O klubie draft updated. <a target="_blank" href="%s">Preview o klubie</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'o_klubie_updated_messages' );
