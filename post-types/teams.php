<?php

/**
 * Registers the `teams` post type.
 */
function teams_init() {
	register_post_type( 'teams', array(
		'labels'                => array(
			'name'                  => __( 'Teams', 'motyw' ),
			'singular_name'         => __( 'Teams', 'motyw' ),
			'all_items'             => __( 'All Teams', 'motyw' ),
			'archives'              => __( 'Teams Archives', 'motyw' ),
			'attributes'            => __( 'Teams Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into teams', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this teams', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'teams', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'teams', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'teams', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'teams', 'motyw' ),
			'filter_items_list'     => __( 'Filter teams list', 'motyw' ),
			'items_list_navigation' => __( 'Teams list navigation', 'motyw' ),
			'items_list'            => __( 'Teams list', 'motyw' ),
			'new_item'              => __( 'New Teams', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Teams', 'motyw' ),
			'edit_item'             => __( 'Edit Teams', 'motyw' ),
			'view_item'             => __( 'View Teams', 'motyw' ),
			'view_items'            => __( 'View Teams', 'motyw' ),
			'search_items'          => __( 'Search teams', 'motyw' ),
			'not_found'             => __( 'No teams found', 'motyw' ),
			'not_found_in_trash'    => __( 'No teams found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Teams:', 'motyw' ),
			'menu_name'             => __( 'Teams', 'motyw' ),
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
		'rest_base'             => 'teams',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'teams_init' );

/**
 * Sets the post updated messages for the `teams` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `teams` post type.
 */
function teams_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['teams'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Teams updated. <a target="_blank" href="%s">View teams</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Teams updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Teams restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Teams published. <a href="%s">View teams</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Teams saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Teams submitted. <a target="_blank" href="%s">Preview teams</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Teams scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview teams</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Teams draft updated. <a target="_blank" href="%s">Preview teams</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'teams_updated_messages' );
