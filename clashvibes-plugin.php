<?php

/**
 * Plugin Name:  clashvibes-plugin
 * Description:  custom posts and audio/video player plugin.
 * Plugin URI:   https://clashvibes.raythompsonwebdev.co.uk
 * Author:       Raymond Thompson
 * Version:      1.0
 * Text Domain:  clashvibes
 * Domain Path:  /languages
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @category   plugin
 * @package    Clashvibes
 * @subpackage plugin
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/clashvibes.git
 * @link       https://clashvibes.raythompsonwebdev.co.uk
 */
// exit if file is called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// remove version from head.
remove_action( 'wp_head', 'wp_generator' );

define( 'CVWD_VERSION', '1.0.0' );
define( 'CVWDPATH', plugin_dir_path( __FILE__ ) );

require_once plugin_dir_path( __FILE__ ) . '/post-types/register.php';

// Audio & Video Custom Post.
add_action( 'init', 'clashvibes_audio_custom_post_type', 0 );
add_action( 'init', 'clashvibes_video_custom_post_type', 0 );


require_once plugin_dir_path( __FILE__ ) . '/taxonomies/register.php';

// Audio & Video Taxonomy.
add_action( 'init', 'clashvibes_register_taxonomies_audio', 0 );
add_action( 'init', 'clashvibes_register_taxonomies_video', 0 );

/**
 *  Flush rewrite rules to add "project" as a permalink slug.
 */
function clashvibes_rewrite_flush() {
	clashvibes_audio_custom_post_type();
	clashvibes_video_custom_post_type();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'clashvibes_rewrite_flush' );

/**
 * Add video meta box.
 */
function add_video_clashes_metaboxes() {
	add_meta_box(
		'video_clash_details',
		esc_html__( 'Video Clash Details', 'clashvibes' ),
		'clashvibes_meta_box_fields',
		'clash-videos',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_video_clashes_metaboxes' );

// video.
add_action( 'load-post.php', 'add_video_clashes_metaboxes' );
add_action( 'load-post-new.php', 'add_video_clashes_metaboxes' );


/**
 * Add audio meta box.
 */
function add_audio_clashes_metaboxes() {
	add_meta_box(
		'audio_clash_details',
		esc_html__( 'Audio Clash Details', 'clashvibes' ),
		'clashvibes_meta_box_fields',
		'clash-audio',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_audio_clashes_metaboxes' );

// audio.
add_action( 'load-post.php', 'add_audio_clashes_metaboxes' );
add_action( 'load-post-new.php', 'add_audio_clashes_metaboxes' );


/**
 *
 *  Display Metabox.
 *
 *  @param post $post post object.
 */
function clashvibes_meta_box_fields( $post ) {

	$clashvibes_stored_meta = get_post_meta( $post->ID );

	// add nonce field.
	wp_nonce_field( basename( __FILE__ ), 'clashvibes_meta_box_nonce' );

	?>
  <!--display mark up for metabox-->
  <h1>Sound System Details</h1>
  <p>
	<label for="sound_system_name">Sound System Name:</label>
	<br />
	<input size="45" id="sound_system_name" name="sound_system_name" value="
		  <?php
			if ( ! empty( $clashvibes_stored_meta['sound_system_name'] ) ) :
				echo esc_attr( $clashvibes_stored_meta['sound_system_name'][0] );
	  endif;
			?>
		  " />
  </p>

  <p>
	<label for="sound_clash_year">Sound Class Year:</label>
	<br />
	<input size="45" id="sound_clash_year" name="sound_clash_year" value="
		<?php
		if ( ! empty( $clashvibes_stored_meta['sound_clash_year'] ) ) :
			echo esc_attr( $clashvibes_stored_meta['sound_clash_year'][0] );
	endif;
		?>
		" />
  </p>

  <p>
	<label for="sound_clash_location">Sound Clash Location:</label>
	<br />
	<input size="45" id="sound_clash_location" name="sound_clash_location" value="
		  <?php
			if ( ! empty( $clashvibes_stored_meta['sound_clash_location'] ) ) :
				echo esc_attr( $clashvibes_stored_meta['sound_clash_location'][0] );
	  endif;
			?>
		  " />
  </p>

	<?php
}

/**
 *
 *  Save metabox attributes.
 *
 *  @param array $post_id post array field.
 */
function clashvibes_meta_save( $post_id ) {

	// Checks save status.
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	$is_valid_nonce = ( isset( wp_unslash( $_POST['clashvibes_meta_box_nonce'] ) ) && wp_verify_nonce( wp_unslash( $_POST['clashvibes_meta_box_nonce'] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status.
	if ( null !== $is_valid_nonce ) {

		// Exits script depending on save status.
		if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
			return;
		}

		if ( isset( $_POST['sound_system_name'] ) ) {

			update_post_meta(
			// Post ID.
				$post_id,
				// Meta key.
				'sound_system_name',
				// Meta value.
				sanitize_text_field( wp_unslash( $_POST['sound_system_name'] ) )
			);
		}

		if ( isset( $_POST['sound_clash_year'] ) ) {

			update_post_meta(
				$post_id,
				'sound_clash_year',
				sanitize_text_field( wp_unslash( $_POST['sound_clash_year'] ) )
			);
		}

		if ( isset( $_POST['sound_clash_location'] ) ) {

			update_post_meta(
				$post_id,
				'sound_clash_location',
				sanitize_text_field( wp_unslash( $_POST['sound_clash_location'] ) )
			);
		}

		if ( isset( $_POST['sound_system_url'] ) ) {

			update_post_meta(
				$post_id,
				'sound_system_url',
				sanitize_text_field( wp_unslash( $_POST['sound_system_url'] ) )
			);
		}
	}
}
add_action( 'save_post', 'clashvibes_meta_save' );


// remove options on uninstall.
// function clashvibes_on_uninstall() {.
// if ( ! current_user_can( 'activate_plugins' ) ) return;.
// delete_option( 'clashvibes_options' );.
// }.
// register_uninstall_hook( __FILE__, 'clashvibes_on_uninstall' );.
