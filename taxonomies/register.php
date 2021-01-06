<?php
/**
 * *PHP version 7
 *
 * Audio Plugin Taxonomy | registeraudio.php.
 *
 * @category   Audio plugin taxonomy
 * @package    Clashvibes
 * @subpackage Audio plugin taxonomy
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/clashvibes.git
 * @link       http:www.raythompsonwebdev.co.uk custom template
 */

/**
 *  Taxonomies
 */
function clashvibes_register_taxonomies_audio() {

	$labels = array(
		'name'              => _x( 'Audio Categories', 'taxonomy general name', CVWDDOMAIN ),
		'singular_name'     => _x( 'Audio Category', 'taxonomy singular name', CVWDDOMAIN ),
		'search_items'      => __( 'Search Audio Categories', CVWDDOMAIN ),
		'all_items'         => __( 'All Audio Categories', CVWDDOMAIN ),
		'parent_item'       => __( 'Parent Audio Category' , CVWDDOMAIN),
		'parent_item_colon' => __( 'Parent Audio Category:', CVWDDOMAIN ),
		'edit_item'         => __( 'Edit Audio Category', CVWDDOMAIN ),
		'update_item'       => __( 'Update Audio Category', CVWDDOMAIN ),
		'add_new_item'      => __( 'Add New Audio Category' , CVWDDOMAIN),
		'new_item_name'     => __( 'New Audio Category', CVWDDOMAIN ),
		'separate_items_with_commas' => __('Separate topics with commas', CVWDDOMAIN),
		'add_or_remove_items'        => __('Add or remove topics', CVWDDOMAIN),
		'choose_from_most_used'      => __('Choose from common topics', CVWDDOMAIN),
		'menu_name'         => __( 'Audio Categories', CVWDDOMAIN ),
	);
	$args   = array(
		'labels'       => $labels,
    'hierarchical' => true,
    'public'                => true,
		'show_admin_column'     => true,
		'show_in_quick_edit'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'    => true,
		'rewrite'      => array(
			'slug'       => 'audio-category', // This controls the base slug that will display before each term.
      'with_front' => true, // Don't display the category base before.
      'hierarchical' => true,
		),
  );

  $post_types = array( 'clash-audio' );

	register_taxonomy( 'audio-category', 'clash-audio', $args );
}

function clashvibes_register_taxonomies_video() {

	$labels = array(
		'name'              => _x( 'Video Categories', 'taxonomy general name', CVWDDOMAIN ),
		'singular_name'     => _x( 'Video Category', 'taxonomy singular name', CVWDDOMAIN ),
		'search_items'      => __( 'Search Video Categories', CVWDDOMAIN ),
		'all_items'         => __( 'All Video Categories', CVWDDOMAIN ),
		'parent_item'       => __( 'Parent Video Category', CVWDDOMAIN ),
		'parent_item_colon' => __( 'Parent Video Category:', CVWDDOMAIN ),
		'edit_item'         => __( 'Edit Video Category', CVWDDOMAIN ),
		'update_item'       => __( 'Update Video Category', CVWDDOMAIN ),
		'add_new_item'      => __( 'Add New Video Category', CVWDDOMAIN ),
		'new_item_name'     => __( 'New Video Category', CVWDDOMAIN ),
		'separate_items_with_commas' => __('Separate topics with commas', CVWDDOMAIN),
		'add_or_remove_items'        => __('Add or remove topics', CVWDDOMAIN),
		'choose_from_most_used'      => __('Choose from common topics', CVWDDOMAIN),
		'menu_name'         => __( 'Video Categories', CVWDDOMAIN ),
	);
	$args   = array(
		'labels'       => $labels,
    'hierarchical' => true,
    'public'                => true,
		'show_admin_column'     => true,
		'show_in_quick_edit'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'    => true,
		'rewrite'      => array(
			'slug'       => 'video-category', // This controls the base slug that will display before each term.
      'with_front' => true, // Don't display the category base before.
      'hierarchical' => true,
		),

	);
	register_taxonomy( 'video-category', 'clash-videos', $args );

}
