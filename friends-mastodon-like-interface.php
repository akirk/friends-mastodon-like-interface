<?php
/**
 * Plugin name: Friends Mastodon-like Interface
 * Plugin author: Alex Kirk
 * Plugin URI: https://github.com/akirk/friends-mastodon-like-interface
 * Version: 0.1
 *
 * Description: Show the Friends status posts in a UI like Mastodon.
 *
 * License: GPL2
 * Text Domain: friends
 *
 * @package Friends_Mastodon_Like_Interface
 */

namespace Friends;

defined( 'ABSPATH' ) || exit;
define( 'FRIENDS_MASTODON_INTERFACE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'wp_enqueue_scripts', function() {
	$handle = 'friends-mastodon-like-interface';
	$file = 'style.css';
	$version = Friends::VERSION;
	wp_enqueue_style( $handle, plugins_url( $file, FRIENDS_MASTODON_INTERFACE_PLUGIN_DIR . '/style.css' ), array(), apply_filters( 'friends_debug_enqueue', $version, $handle, FRIENDS_MASTODON_INTERFACE_PLUGIN_DIR . '/' . $file ) );
} );

add_filter( 'friends_template_paths', function( $file_paths ) {
	$file_paths[ 15 ] = FRIENDS_MASTODON_INTERFACE_PLUGIN_DIR . 'templates';
	return $file_paths;
} );
