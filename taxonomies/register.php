<?php

/**
 * *PHP version 8.1
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
 * @return void
 * @param array $labels labels.
 * @param array $args labels.
 */
function clashvibes_register_taxonomies_audio()
{
  $labels = array(
    'name'                       => _x('Audio Categories', 'taxonomy general name', 'clashvibes'),
    'singular_name'              => _x('Audio Category', 'taxonomy singular name', 'clashvibes'),
    'search_items'               => __('Search Audio Categories', 'clashvibes'),
    'all_items'                  => __('All Audio Categories', 'clashvibes'),
    'parent_item'                => __('Parent Audio Category', 'clashvibes'),
    'parent_item_colon'          => __('Parent Audio Category:', 'clashvibes'),
    'edit_item'                  => __('Edit Audio Category', 'clashvibes'),
    'update_item'                => __('Update Audio Category', 'clashvibes'),
    'add_new_item'               => __('Add New Audio Category', 'clashvibes'),
    'new_item_name'              => __('New Audio Category', 'clashvibes'),
    'separate_items_with_commas' => __('Separate topics with commas', 'clashvibes'),
    'add_or_remove_items'        => __('Add or remove topics', 'clashvibes'),
    'choose_from_most_used'      => __('Choose from common topics', 'clashvibes'),
    'menu_name'                  => __('Audio Categories', 'clashvibes'),
  );
  $args   = array(
    'labels'                => $labels,
    'hierarchical'          => true,
    'public'                => true,
    'show_admin_column'     => true,
    'show_in_quick_edit'    => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array(
      'slug'         => 'audio-category', // This controls the base slug that will display before each term.
      'with_front'   => true, // Don't display the category base before.
      'hierarchical' => true,
    ),
  );

  register_taxonomy('audio-category', 'clash-audio', $args);
}
/**
 * Register taxonomies function
 *
 * @return void
 * @param array $labels labels.
 * @param array $args labels.
 */
function clashvibes_register_taxonomies_video()
{
  $labels = array(
    'name'                       => _x('Video Categories', 'taxonomy general name', 'clashvibes'),
    'singular_name'              => _x('Video Category', 'taxonomy singular name', 'clashvibes'),
    'search_items'               => __('Search Video Categories', 'clashvibes'),
    'all_items'                  => __('All Video Categories', 'clashvibes'),
    'parent_item'                => __('Parent Video Category', 'clashvibes'),
    'parent_item_colon'          => __('Parent Video Category:', 'clashvibes'),
    'edit_item'                  => __('Edit Video Category', 'clashvibes'),
    'update_item'                => __('Update Video Category', 'clashvibes'),
    'add_new_item'               => __('Add New Video Category', 'clashvibes'),
    'new_item_name'              => __('New Video Category', 'clashvibes'),
    'separate_items_with_commas' => __('Separate topics with commas', 'clashvibes'),
    'add_or_remove_items'        => __('Add or remove topics', 'clashvibes'),
    'choose_from_most_used'      => __('Choose from common topics', 'clashvibes'),
    'menu_name'                  => __('Video Categories', 'clashvibes'),
  );
  $args   = array(
    'labels'                => $labels,
    'hierarchical'          => true,
    'public'                => true,
    'show_admin_column'     => true,
    'show_in_quick_edit'    => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array(
      'slug'         => 'video-category', // This controls the base slug that will display before each term.
      'with_front'   => true, // Don't display the category base before.
      'hierarchical' => true,
    ),

  );
  register_taxonomy('video-category', 'clash-videos', $args);
}

/**
 * Register taxonomies function
 *
 * @return void
 * @param array $labels labels.
 * @param array $args labels.
 */
function clashvibes_register_taxonomies_events()
{
  $labels = array(
    'name'                       => _x('Events Categories', 'taxonomy general name', 'clashvibes'),
    'singular_name'              => _x('Events Category', 'taxonomy singular name', 'clashvibes'),
    'search_items'               => __('Search Events Categories', 'clashvibes'),
    'all_items'                  => __('All Events Categories', 'clashvibes'),
    'parent_item'                => __('Parent Events Category', 'clashvibes'),
    'parent_item_colon'          => __('Parent Events Category:', 'clashvibes'),
    'edit_item'                  => __('Edit Events Category', 'clashvibes'),
    'update_item'                => __('Update Events Category', 'clashvibes'),
    'add_new_item'               => __('Add New Events Category', 'clashvibes'),
    'new_item_name'              => __('New Events Category', 'clashvibes'),
    'separate_items_with_commas' => __('Separate topics with commas', 'clashvibes'),
    'add_or_remove_items'        => __('Add or remove topics', 'clashvibes'),
    'choose_from_most_used'      => __('Choose from common topics', 'clashvibes'),
    'menu_name'                  => __('Events Categories', 'clashvibes'),
  );
  $args   = array(
    'labels'                => $labels,
    'hierarchical'          => true,
    'public'                => true,
    'show_admin_column'     => true,
    'show_in_quick_edit'    => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array(
      'slug'         => 'events-category', // This controls the base slug that will display before each term.
      'with_front'   => true, // Don't display the category base before.
      'hierarchical' => true,
    ),

  );
  register_taxonomy('events-category', 'clash-events', $args);
}
