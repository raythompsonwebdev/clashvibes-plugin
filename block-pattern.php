<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
 * Currently plugin version.
 */
define('LIL_BP_VERSION', '1.0.0');

/**
 * Plugin URL
 */
define('LIL_BP_URL', plugin_dir_url(__FILE__)); //This include the trailing slash!

function clashvibes_plugin_editor_style()
{
  add_editor_style('includes/css/custom-editor-style.css');
}
add_action('admin_init', 'clashvibes_plugin_editor_style');

function clashvibes_plugin_enqueue_pattern_style()
{
  wp_enqueue_style('clashvibes_plugin_pattern_style', plugins_url('includes/css/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'clashvibes_plugin_enqueue_pattern_style');

function clashvibes_plugin_register_block_patterns()
{

  if (class_exists('WP_Block_Patterns_Registry')) {

    $events = '<!-- wp:columns {"verticalAlignment":"top","align":"wide","className":"alignwide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"","style":{"typography":{"fontSize":"16px"}}} -->
    <div class="wp-block-column is-vertically-aligned-top" style="font-size:16px">
    <!-- wp:heading -->
    <h2 class="caption-header">Location</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>...</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top","width":"","style":{"typography":{"fontSize":"16px"}}} -->
    <div class="wp-block-column is-vertically-aligned-top" style="font-size:16px">
    <!-- wp:heading -->
    <h2 class="caption-header">Date</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>...</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top","width":"","style":{"typography":{"fontSize":"16px"}}} -->
    <div class="wp-block-column is-vertically-aligned-top" style="font-size:16px">
    <!-- wp:heading -->
    <h2 class="caption-header">Details</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>...</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top"} -->
    <div class="wp-block-column is-vertically-aligned-top"><!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"top","justifyContent":"space-between"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"width":100,"style":{"border":{"radius":"8px"}}} -->
    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:8px">Find Tickets</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->';

    register_block_pattern_category(
      'event-page-block-pattern',
      array(
        'label' => __('Single Event Page Pattern', 'clashvibes'),
      )
    );

    register_block_pattern(
      'clashvibes/events-page-pattern',
      array(
        'title'       => __('Single Event Pattern', 'clashvibes'),
        'description' => _x('Columns for making lists with event details. ', 'Block pattern description', 'clashvibes'),
        'keywords' => array('events', 'event location', 'events details , event date'),
        'content'     => $events,
        'categories'  => array('events-page-block-pattern'),
      )
    );
  }
}
add_action('init', 'clashvibes_plugin_register_block_patterns');
