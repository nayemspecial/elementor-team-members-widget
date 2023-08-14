<?php
/*
Plugin Name: Elementor Addons
Plugin URI: projuktiplus.com
Description: Defference types of widgets are here.
Version: 1.0.0
Author: Nayemur Rahman
Author URI: nayem.me
Text Domain: projukti-plus
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function pp_register_team_member_widget( $widgets_manager ) {

	require_once( __DIR__ . '/includes/widgets/team-members.php' );

	$widgets_manager->register( new \Team_Members_Widget() );

}
add_action( 'elementor/widgets/register', 'pp_register_team_member_widget' );


// Enqueue CSS styles for your Elementor add-on
function pp_enqueue_team_members_styles() {
	
    wp_enqueue_style('team-members-styles', plugins_url('assets/css/style.css', __FILE__), array(), '1.0.0', 'all');

	// Enqueue Slick Slider CSS
	wp_enqueue_style('slick-slider', plugins_url('assets/css/slick.min.css', __FILE__), array(), '1.0.0', 'all');


	// Enqueue Slick Slider JavaScript
	wp_enqueue_script('slick-slider', plugins_url('assets/js/slick.min.js', __FILE__), array(), '1.0.0', true);

	// Enqueue your custom JavaScript
	wp_enqueue_script('custom-script', plugins_url('assets/js/custom.js', __FILE__), array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'pp_enqueue_team_members_styles');

