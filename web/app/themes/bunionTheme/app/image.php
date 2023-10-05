<?php

// Add images sizes.
function custom_theme_setup() {
	add_image_size('card-image', 298, 186, true);
	add_image_size('blog-image', 500, 300, true);
	add_image_size('example-image', 400, 400, true);
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

// Make custom sizes selectable from WordPress admin.
function custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'card-image' => __( 'Card' ),
		'blog-image' => __( 'Blog' ),
		'example-image' => __( 'Example' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'custom_image_sizes' );