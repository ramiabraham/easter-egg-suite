<?php
/*
Plugin Name: MonkeyTaco Easter Eggs
Plugin URI: http://monkeyta.co
Description: A series of easter eggs that trigger small actions when users enter specific keystroke combinations
Version:  0.1.1
Author: MonkeyTaco
Author URI: http://monkeyta.co
License: GPLv2 or later

Copyright 2013  Andrew Adcock  (email : andrew@monkeyta.co)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! function_exists('add_eggs_mtaco')) {
function add_eggs_mtaco() {
  $pluginUrl = WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__));
	
	wp_register_script('konami-mtaco', $pluginUrl.'/js/konami.js', array('jquery'));
	wp_enqueue_script('konami-mtaco');
	
	wp_register_script('mk-blood-mtaco', $pluginUrl.'/js/mortal-kombat-blood.js', array('jquery'));
    wp_enqueue_script('mk-blood-mtaco');
}
} //exists check
add_action('admin_init', add_eggs_mtaco());

?>
