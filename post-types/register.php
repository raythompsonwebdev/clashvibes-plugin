<?php
/**
 * *PHP version 7
 *
 * Plugin Name: Clashvibes-Plugin
 * Plugin URI: https://clashvibes.raythompsonwebdev.co.uk
 * Description: clashvibes custom post types
 * Version: 0.1
 * Author: Raymond Thompson
 * Author URI: https://clashvibes.raythompsonwebdev.co.uk
 * License: GPL2
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @category   Audio Plugin
 * @package    Clashvibes
 * @subpackage Audio Plugin
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/clashvibes.git
 * @link       http:www.raythompsonwebdev.co.uk custom template
 */


/**
 * Creating a function to create our CPT.
 */
function clashvibes_audio_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Sound Clash Audio', 'Post Type General Name', CVWDDOMAIN ),
		'singular_name'         => _x( 'Sound Clash Audio', 'Post Type Singular Name', CVWDDOMAIN ),
		'menu_name'             => __( 'Sound Clash Audio', 'Admin Menu text', CVWDDOMAIN ),
		'name_admin_bar'        => __( 'Sound Clash Audio', 'Add New on Toolbar', CVWDDOMAIN ),
		'parent_item_colon'     => __( 'Parent Sound Clash Audio', CVWDDOMAIN ),
		'all_items'             => __( 'Sound Clash Audio', CVWDDOMAIN ),
		'view_item'             => __( 'View Sound Clash Audio', CVWDDOMAIN ),
		'add_new_item'          => __( 'Add New Sound Clash Audio', CVWDDOMAIN ),
		'add_new'               => __( 'Add Sound Clash Audio', CVWDDOMAIN ),
		'edit_item'             => __( 'Edit Sound Clash Audio', CVWDDOMAIN ),
		'update_item'           => __( 'Update Sound Clash Audio', CVWDDOMAIN ),
		'search_items'          => __( 'Search Sound Clash Audio', CVWDDOMAIN ),
		'not_found'             => __( 'Not Found', CVWDDOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', CVWDDOMAIN ),
		'featured_image'        => __( 'Featured Image', CVWDDOMAIN ),
		'set_featured_image'    => __( 'Set featured image', CVWDDOMAIN ),
		'remove_featured_image' => __( 'Remove featured image', CVWDDOMAIN ),
		'use_featured_image'    => __( 'Use as featured image', CVWDDOMAIN ),
	);

	$args = array(
		'label'                => __( 'Sound Clash Audio', CVWDDOMAIN ),
		'description'          => __( 'Sound Clash Audio news and reviews', CVWDDOMAIN ),
		'labels'               => $labels,
		'show_in_rest' 				 => true,
		'supports'             => array( 'title', 'editor', 'post-formats', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		'taxonomies'           => array( 'audio-category', 'post_tag' ),
		/**
		 * A hierarchical CPT is like Pages and can have
		 * Parent and child items. A non-hierarchical CPT
		 * is like Posts.
		 *
		 */
    //'menu_icon'   => get_stylesheet_directory_uri() . '/images/portfolio-icon.png',
		'register_meta_box_cb' => 'add_audio_clashes_metaboxes',
		'hierarchical'         => false,
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
    'show_in_admin_bar'    => true,
    'show_in_rest'         => true,
    'menu_icon'            => 'dashicons-welcome-widgets-menus',
		'menu_position'        => 5,
		'can_export'           => true,
    'query_var'            => true,
    'rewrite'              => array( 'slug' => 'clash-audio' ),
		'has_archive'          => true,
		'exclude_from_search'  => false,
		'publicly_queryable'   => true,
		'capability_type'      => 'post',
	);

	// Registering your Audio Custom Post Type.
	register_post_type( 'clash-audio', $args );
}

/**
 * Creating a function to create our CPT.
 */
function clashvibes_video_custom_post_type() {

	/**
	 * 'menu_icon'   => get_stylesheet_directory_uri() . '/images/portfolio-icon.png',
	 * 'menu_icon' => 'dashicons-download',
	 */

	// Set UI labels for Video Custom Post Type.
	$labels = array(
		'name'                  => _x( 'Sound Clash Video', 'Post Type General Name', CVWDDOMAIN ),
		'singular_name'         => _x( 'Sound Clash Video', 'Post Type Singular Name', CVWDDOMAIN ),
		'menu_name'             => __( 'Sound Clash Video', CVWDDOMAIN ),
		'name_admin_bar'        => __( 'Sound Clash Video', CVWDDOMAIN ),
		'parent_item_colon'     => __( 'Parent Sound Clash Video', CVWDDOMAIN ),
		'all_items'             => __( 'Sound Clash Video', CVWDDOMAIN ),
		'view_item'             => __( 'View Sound Clash Video', CVWDDOMAIN ),
		'add_new_item'          => __( 'Add New Sound Clash Video', CVWDDOMAIN ),
		'add_new'               => __( 'Add Sound Clash Video', CVWDDOMAIN ),
		'edit_item'             => __( 'Edit Sound Clash Video', CVWDDOMAIN ),
		'update_item'           => __( 'Update Sound Clash Video', CVWDDOMAIN ),
		'search_items'          => __( 'Search Sound Clash Video', CVWDDOMAIN ),
		'not_found'             => __( 'Not Found', CVWDDOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', CVWDDOMAIN ),
		'featured_image'        => __( 'Featured Image', CVWDDOMAIN ),
		'set_featured_image'    => __( 'Set featured image', CVWDDOMAIN ),
		'remove_featured_image' => __( 'Remove featured image', CVWDDOMAIN ),
		'use_featured_image'    => __( 'Use as featured image', CVWDDOMAIN ),
	);

	// Set other options for Video Custom Post Type.
	$args = array(
		'label'                => __( 'Sound Clash Video', CVWDDOMAIN ),
		'description'          => __( 'Sound Clash Video news and reviews', CVWDDOMAIN ),
		'labels'               => $labels,
		'show_in_rest' 				 => true,
		'supports'             => array( 'title', 'editor', 'post-formats', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		'taxonomies'           => array( 'video-category', 'post_tag' ),
    //'menu_icon'   => get_stylesheet_directory_uri() . '/images/portfolio-icon.png',
		'register_meta_box_cb' => 'add_video_clashes_metaboxes',
		'hierarchical'         => false,
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
    'show_in_nav_menus'    => true,
    'show_in_rest'         => true,
    'menu_icon'            => 'dashicons-welcome-widgets-menus',
		'show_in_admin_bar'    => true,
		'menu_position'        => 5,
    'query_var'            => true,
    'rewrite'              => array( 'slug' => 'clash-video' ),
		'can_export'           => true,
		'has_archive'          => true,
		'exclude_from_search'  => false,
		'publicly_queryable'   => true,
		'capability_type'      => 'post',
	);

	// Registering Video Custom Post Type.
	register_post_type( 'clash-videos', $args );
}


