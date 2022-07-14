<?php
/*
Plugin Name: Template Display
Description: 使用しているテンプレート名を表示するだけ
Version: 1.0
Author: taka0808
Author URI: https://github.com/taka0808
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'MY_PLUGIN_VERSION' ) ) {
	define( 'MY_PLUGIN_VERSION', '1.0' );
}
if ( ! defined( 'MY_PLUGIN_PATH' ) ) {
	define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'MY_PLUGIN_URL' ) ) {
	define( 'MY_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style(
		'template-display',
		MY_PLUGIN_URL.'css/style.css',
		array(),
		MY_PLUGIN_VERSION
	);
});

add_action( 'wp_head', function() {
  if (is_user_logged_in()){
    global $template;
    $thema_name = basename(dirname($template));
    $template_name = basename($template, '.php');
  }
  echo '<p class="template-display">' . $thema_name . ' | ' . $template_name . '.php</p>';
});