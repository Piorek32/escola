<?php

/**
 * Registers the `hero` post type.
 */
function hero_init() {
	register_post_type( 'hero', array(
		'labels'                => array(
			'name'                  => __( 'Heroes', 'motyw' ),
			'singular_name'         => __( 'Hero', 'motyw' ),
			'all_items'             => __( 'All Heroes', 'motyw' ),
			'archives'              => __( 'Hero Archives', 'motyw' ),
			'attributes'            => __( 'Hero Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into hero', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this hero', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'hero', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'hero', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'hero', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'hero', 'motyw' ),
			'filter_items_list'     => __( 'Filter heroes list', 'motyw' ),
			'items_list_navigation' => __( 'Heroes list navigation', 'motyw' ),
			'items_list'            => __( 'Heroes list', 'motyw' ),
			'new_item'              => __( 'New Hero', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Hero', 'motyw' ),
			'edit_item'             => __( 'Edit Hero', 'motyw' ),
			'view_item'             => __( 'View Hero', 'motyw' ),
			'view_items'            => __( 'View Heroes', 'motyw' ),
			'search_items'          => __( 'Search heroes', 'motyw' ),
			'not_found'             => __( 'No heroes found', 'motyw' ),
			'not_found_in_trash'    => __( 'No heroes found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Hero:', 'motyw' ),
			'menu_name'             => __( 'Heroes', 'motyw' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'hero',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'hero_init' );

/**
 * Sets the post updated messages for the `hero` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `hero` post type.
 */
function hero_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['hero'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Hero updated. <a target="_blank" href="%s">View hero</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Hero updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Hero restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Hero published. <a href="%s">View hero</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Hero saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Hero submitted. <a target="_blank" href="%s">Preview hero</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Hero scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview hero</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Hero draft updated. <a target="_blank" href="%s">Preview hero</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'hero_updated_messages' );
