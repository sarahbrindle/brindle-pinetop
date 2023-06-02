<?php 

add_action( 'wp_enqueue_scripts', 'brindle_enqueue_scripts_styles' );
function brindle_enqueue_scripts_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
	wp_enqueue_style( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/css/easy-responsive-tabs.css' ); 
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/js/easy-responsive-tabs.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-scrolltofixed', get_stylesheet_directory_uri() . '/assets/js/jquery-scrolltofixed-min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'show-hide-amenities', get_stylesheet_directory_uri() . '/assets/js/show-hide-amenities.js', array( 'jquery' ), '1.0', true );
	wp_register_script('custom_script', get_stylesheet_directory_uri() . '/assets/js/all.min.js', array('jquery'),'1.0',true);
}

// Includes color stuff
require_once get_stylesheet_directory() . '/inc/css-output-child.php';

add_theme_support( 'editor-styles' );

// Enqueue block assets
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'brindle-pinetop', get_stylesheet_directory_uri() . "/block-editor.css", false, '1.0', 'all' );
} );


// Add the open_body function to the 'wp_body_open' action hook
add_action('wp_body_open', 'open_body');
function open_body() {
    echo '<div class="generatepress-body-wrapper">';
}

// Add the close_body function to the 'generate_after_footer' action hook
add_action('generate_after_footer', 'close_body');
function close_body() {
    echo '</div>';
}

function available_neighborhood_function() {
	ob_start(); 
	include_once(get_stylesheet_directory().'/cpt/show_neighborhood.php');
	$content = ob_get_clean();
	return $content;
}

add_action( 'init', 'register_shortcodes');
function register_shortcodes(){
   add_shortcode('available-neighborhood', 'available_neighborhood_function');
}

include_once(get_stylesheet_directory().'/cpt/neighborhood.php');

add_shortcode ('year', 'year_shortcode');
function year_shortcode () {
	$year = date_i18n ('Y');
	return $year;
}

require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/sarahbrindle/brindle-pinetop/',
	__FILE__,
	'brindle-pinetop'
);

// Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');