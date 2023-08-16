<?php
/**
 * @package DS8 clasificados
 */
/*
Plugin Name: DS8 Leyes normativas
Plugin URI: https://deseisaocho.com/
Description: FD <strong>Leyes normativas</strong>
Version: 1.0
Author: JLMA
Author URI: https://deseisaocho.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: ds8clasificados
*/


if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'DS8LEYESNORMATIVAS_VERSION', '1' );
define( 'DS8LEYESNORMATIVAS_MINIMUM_WP_VERSION', '5.0' );
define( 'DS8LEYESNORMATIVAS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, array( 'DS8Leyesnormativas', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'DS8Leyesnormativas', 'plugin_deactivation' ) );

require_once DS8LEYESNORMATIVAS_PLUGIN_DIR . '/includes/helpers.php';
require_once( DS8LEYESNORMATIVAS_PLUGIN_DIR . 'class.ds8leyesnormativas.php' );

add_action( 'init', array( 'DS8Leyesnormativas', 'init' ) );

/*if ( is_admin() ) {
	require_once( DS8LEYESNORMATIVAS__PLUGIN_DIR . 'class.ds8clasificado-admin.php' );
	add_action( 'init', array( 'DS8Clasificado_Admin', 'init' ) );
}*/