<?php

/**
 * Registers the `dane_kontaktowe` post type.
 */
function dane_kontaktowe_init() {
	register_post_type( 'dane-kontaktowe', array(
		'labels'                => array(
			'name'                  => __( 'Dane kontaktowes', 'motyw' ),
			'singular_name'         => __( 'Dane kontaktowe', 'motyw' ),
			'all_items'             => __( 'All Dane kontaktowes', 'motyw' ),
			'archives'              => __( 'Dane kontaktowe Archives', 'motyw' ),
			'attributes'            => __( 'Dane kontaktowe Attributes', 'motyw' ),
			'insert_into_item'      => __( 'Insert into dane kontaktowe', 'motyw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this dane kontaktowe', 'motyw' ),
			'featured_image'        => _x( 'Featured Image', 'dane-kontaktowe', 'motyw' ),
			'set_featured_image'    => _x( 'Set featured image', 'dane-kontaktowe', 'motyw' ),
			'remove_featured_image' => _x( 'Remove featured image', 'dane-kontaktowe', 'motyw' ),
			'use_featured_image'    => _x( 'Use as featured image', 'dane-kontaktowe', 'motyw' ),
			'filter_items_list'     => __( 'Filter dane kontaktowes list', 'motyw' ),
			'items_list_navigation' => __( 'Dane kontaktowes list navigation', 'motyw' ),
			'items_list'            => __( 'Dane kontaktowes list', 'motyw' ),
			'new_item'              => __( 'New Dane kontaktowe', 'motyw' ),
			'add_new'               => __( 'Add New', 'motyw' ),
			'add_new_item'          => __( 'Add New Dane kontaktowe', 'motyw' ),
			'edit_item'             => __( 'Edit Dane kontaktowe', 'motyw' ),
			'view_item'             => __( 'View Dane kontaktowe', 'motyw' ),
			'view_items'            => __( 'View Dane kontaktowes', 'motyw' ),
			'search_items'          => __( 'Search dane kontaktowes', 'motyw' ),
			'not_found'             => __( 'No dane kontaktowes found', 'motyw' ),
			'not_found_in_trash'    => __( 'No dane kontaktowes found in trash', 'motyw' ),
			'parent_item_colon'     => __( 'Parent Dane kontaktowe:', 'motyw' ),
			'menu_name'             => __( 'Dane kontaktowes', 'motyw' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),

		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'dane-kontaktowe',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'dane_kontaktowe_init' );

/**
 * Sets the post updated messages for the `dane_kontaktowe` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `dane_kontaktowe` post type.
 */
function dane_kontaktowe_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['dane-kontaktowe'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Dane kontaktowe updated. <a target="_blank" href="%s">View dane kontaktowe</a>', 'motyw' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'motyw' ),
		3  => __( 'Custom field deleted.', 'motyw' ),
		4  => __( 'Dane kontaktowe updated.', 'motyw' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Dane kontaktowe restored to revision from %s', 'motyw' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Dane kontaktowe published. <a href="%s">View dane kontaktowe</a>', 'motyw' ), esc_url( $permalink ) ),
		7  => __( 'Dane kontaktowe saved.', 'motyw' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Dane kontaktowe submitted. <a target="_blank" href="%s">Preview dane kontaktowe</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Dane kontaktowe scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview dane kontaktowe</a>', 'motyw' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Dane kontaktowe draft updated. <a target="_blank" href="%s">Preview dane kontaktowe</a>', 'motyw' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'dane_kontaktowe_updated_messages' );
