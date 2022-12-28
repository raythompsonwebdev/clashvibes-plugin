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
        'description' => _x('Columns for making lists with image and header. ', 'Block pattern description', 'clashvibes'),
        'content'     => '
        <!-- wp:group {"align":"wide"} -->
				<div class="wp-block-group alignwide">
					<div class="wp-block-group__inner-container">

						<!-- wp:columns {"align":"wide"} -->
						<div class="wp-block-columns alignwide">
							<!-- wp:column -->
							<div class="wp-block-column">

							  <!-- wp:heading {"level":4} -->
								<h4>Location</h4>
								<!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>..</p>
                <!-- /wp:paragraph -->

							</div>
							<!-- /wp:column -->

							<!-- wp:column -->
							<div class="wp-block-column">

								<!-- wp:heading {"level":4} -->
								<h4>Date</h4>
								<!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>..</p>
                <!-- /wp:paragraph -->

							</div>
							<!-- /wp:column -->

							<!-- wp:column -->
							<div class="wp-block-column">

                <!-- wp:heading {"level":4} -->
                <h4>Details</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>..</p>
                <!-- /wp:paragraph -->

							</div>
							<!-- /wp:column -->

							<!-- wp:column -->
							<div class="wp-block-column">

              <!-- wp:button {"width":75,"style":{"border":{"radius":"12px"}},"className":"is-style-fill"} /-->

							</div>
							<!-- /wp:column -->
						</div>
						<!-- /wp:columns -->

					</div>
				</div>
				<!-- /wp:group -->',
        'categories'  => array('events-page-block-pattern'),
      )
    );
  }
}
add_action('init', 'clashvibes_plugin_register_block_patterns');