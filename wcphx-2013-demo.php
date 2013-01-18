<?php
/**
 * Plugin Name: WCPHX Demo
 * Plugin URL:  http://jumping-duck.com
 * Description: Demo Plugin for WordCamp Phoenix
 * Version:     1.0
 * Author:      Eric Mann
 * Author URI:  http://eamann.com
 * License:     GPL2+
 */

/**
 * Copyright 2013  Alorum
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Useful global constants
define( 'WCPHX2013_VERSION', '1.0' );
define( 'WCPHX2013_URL',     plugin_dir_url( __FILE__ ) );
define( 'WCPHX2013_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function wcphx2013_init() {
	load_plugin_textdomain( 'wcphx2013_translate', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/lang' );
}

/**
 * Activate the plugin
 */
function wcphx2013_activate() {

}
register_activation_hook( __FILE__, 'wcphx2013_deactivate' );

/**
 * Deactivate the plugin
 */
function wcphx2013_deactivate() {

}
register_deactivation_hook( __FILE__, 'wcphx2013_deactivate' );

// Wireup actions
add_action( 'init', 'wcphx2013_init' );

// Wireup filters

// Wireup shortcodes