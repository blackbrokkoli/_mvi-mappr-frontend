<?php

/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */






if (!function_exists('twentytwentytwo_support')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support()
	{

		// Add support for block styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');
	}


	//  KOLJA EDITS START

	function my_custom_post_product()
	{
		$labels = array(
			'name'               => _x('Products', 'post type general name'),
			'singular_name'      => _x('Product', 'post type singular name'),
			'add_new'            => _x('Add New', 'book'),
			'add_new_item'       => __('Add New Product'),
			'edit_item'          => __('Edit Product'),
			'new_item'           => __('New Product'),
			'all_items'          => __('All Products'),
			'view_item'          => __('View Product'),
			'search_items'       => __('Search Products'),
			'not_found'          => __('No products found'),
			'not_found_in_trash' => __('No products found in the Trash'),
			'menu_name'          => 'Products'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds our products and product specific data',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			'has_archive'   => true,
		);
		register_post_type('product', $args);
	}
	add_action('init', 'my_custom_post_product');

// KOLJA EDITS END


endif;

add_action('after_setup_theme', 'twentytwentytwo_support');

if (!function_exists('twentytwentytwo_styles')) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style('twentytwentytwo-style');
	}

endif;

add_action('wp_enqueue_scripts', 'twentytwentytwo_styles');

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
