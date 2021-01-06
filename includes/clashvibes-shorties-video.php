<?php
/**
 * Plugin Name: Clashvibes-Video Player!
 * Description: HTML Code.
 * Author: Raymond Thompson.
 * Version: 1.0.
 * Author URI: http://www.raythompsonwebdev.co.uk.
 *
 * @package Video player
 */

/**
 * Video Player Shortcode
 *
 * @param string  $atts  comment about this variable.
 * @param string $src  comment about this variable.
 * @param string $title  comment about this variable.
 * @return mixed
 * I place the shortcode [hero][/hero] in by Blog Posts page.
 * This is how it looks in frontend.
 */
function clashvibes_video_enqueue_style() {	
	wp_enqueue_style( 'clashvibes_video_style', plugins_url('/css/style.css',__FILE__ ) );	    

}
add_action( 'wp_enqueue_scripts', 'clashvibes_video_enqueue_style' );

function clashvibes_videoplayer_callback( $atts ) {

	$args = shortcode_atts(
		array(
			'src'   => 'https://clashbucket.s3.eu-west-2.amazonaws.com/clashbucket/',
			'title' => 'images/nothing.jpg',
		),
		$atts
	);

	$title = esc_html( $args['title']);
	$src   = esc_url( $args['src'] );
	
	wp_enqueue_script( 'clashvibes_video_script', plugins_url('/js/video-es6.js',__FILE__ ) );
	ob_start();
	?>
 <div class="videoExcerpt">

		<!--Video sources-->
		<video id="video_player" poster="<?php echo esc_url(plugin_dir_path( __FILE__ ) . $title); ?>">
			<source src="<?php echo esc_url( $src ); ?>.mp4" preload="metadata" type='video/mp4'  />
			<source src="<?php echo esc_url( $src ); ?>.m4v" preload="metadata" type='video/m4v'  />
			<source src="<?php echo esc_url( $src ); ?>.webm" preload="metadata" type='video/webm' />
			<p><?php esc_html_e( 'Your browser does not support HTML5 video.', 'clashvibes' ); ?></p>
		</video>

		<!--Video controls-->
		<div id="videocontrols">

			<div id="btns_box">
				<button id="play_toggle" class="player-button">
					<i class="fa fa-play" aria-hidden="true" title="Play"></i>
				</button>
				<button id="rewind" class="player-button">
					<i class="fa fa-backward" aria-hidden="true" title="Backward"></i>
				</button>
				<button id="forward" class="player-button">
					<i class="fa fa-forward" aria-hidden="true" title="Forward"></i>
				</button>
			</div>

			<div id="progress">
				<progress value="0" id="playback"></progress>
				<span id="load_progress"></span>
				<span id="play_progress"></span>
			</div>

			<div id="time">
				<span><?php esc_html_e( 'Current Time', 'clashvibes' ); ?></span>
				<span id="current_time">00:00</span>
				<span><?php esc_html_e( 'Duration', 'clashvibes' ); ?></span>
				<span id="duration_time">00:00</span>
			</div>

			<div id="video_volume">
				<label id="volume_bar" for="volume"><?php esc_html_e( 'Volume', 'clashvibes' ); ?></label>
				<input type="range" id="volume" title="volume" min="0" max="1" step="0.1" value="1">
			</div>

			<div id="video_seek">
				<label for="seek"><?php esc_html_e( 'Seek', 'clashvibes' ); ?></label>
				<input type="range" id="seek" title="seek" min="0" value="0" max="0">
			</div>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'videoplayer', 'clashvibes_videoplayer_callback' );
?>
