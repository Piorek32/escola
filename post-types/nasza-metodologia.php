<?php

/**
 * Registers the `nasza_metodologia` post type.
 */
function nasza_metodologia_init() {
	register_post_type( 'nasza-metodologia', array(
		'labels'                => array(
			'name'                  => __( 'Nasza metodologias', 'motyw' ),
			'singular_name'         => __( 'Nasza metodologia', 'motyw' ),
			'all_items'             => __( 'All Nasza metodologias', 'motyw' ),
			'archives'              => __( 'Nasza metodologia Archives', 'motyw' ),
			'attributes'            => __( 'Nasza metodologia Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into nasza metodologia', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this nasza metodologia', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'nasza-metodologia', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'nasza-metodologia', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'nasza-metodologia', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'nasza-metodologia', 'motyw' ),
			'filter_items_list'     => __( 'Filter nasza metodologias list', 'motyw' ),
			'items_list_navigation' => __( 'Nasza metodologias list navigation', 'motyw' ),
			'items_list'            => __( 'Nasza metodologias list', 'motyw' ),
			'new_item'              => __( 'New Nasza metodologia', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Nasza metodologia', 'motyw' ),
			'edit_item'             => __( 'Edit Nasza metodologia', 'motyw' ),
			'view_item'             => __( 'View Nasza metodologia', 'motyw' ),
			'view_items'            => __( 'View Nasza metodologias', 'motyw' ),
			'search_items'          => __( 'Search nasza metodologias', 'motyw' ),
			'not_found'             => __( 'No nasza metodologias found', 'motyw' ),
			'not_found_in_trash'    => __( 'No nasza metodologias found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Nasza metodologia:', 'motyw' ),
			'menu_name'             => __( 'Nasza metodologias', 'motyw' ),
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
		'rest_base'             => 'nasza-metodologia',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'nasza_metodologia_init' );

/**
 * Sets the post updated messages for the `nasza_metodologia` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `nasza_metodologia` post type.
 */
function nasza_metodologia_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['nasza-metodologia'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Nasza metodologia updated. <a target="_blank" href="%s">View nasza metodologia</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Nasza metodologia updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Nasza metodologia restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Nasza metodologia published. <a href="%s">View nasza metodologia</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Nasza metodologia saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Nasza metodologia submitted. <a target="_blank" href="%s">Preview nasza metodologia</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Nasza metodologia scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview nasza metodologia</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Nasza metodologia draft updated. <a target="_blank" href="%s">Preview nasza metodologia</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'nasza_metodologia_updated_messages' );
