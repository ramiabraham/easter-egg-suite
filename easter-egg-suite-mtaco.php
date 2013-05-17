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
if  ( ! function_exists('add_eggs_mtaco')) {
function add_eggs_mtaco() {
  $pluginUrl = WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__));
	
	// konami code
	
	function mtaco_get_the_konami_code_js() {
	wp_enqueue_script(
		'konami-mtaco',
		plugins_url( '/js/konami.js' , __FILE__ ),
		array( 'jquery' )
	); //wp_localize_script to do
}

add_action( 'wp_enqueue_scripts', 'mtaco_get_the_konami_code_js' );

	// blood code
	
	function mtaco_get_the_mk_code_js() {
	wp_enqueue_script(
		'mk-blood-mtaco',
		plugins_url( '/js/mortal-kombat-blood.js' , __FILE__ ),
		array( 'jquery' )
	); //wp_localize_script to do
}

add_action( 'wp_enqueue_scripts', 'mtaco_get_the_mk_code_js' );


} // add_eggs_mtaco
} // exists check
if (! is_admin() ) {add_action('init', add_eggs_mtaco());} // don't load in wp-admin


/*end front-end - all the rest is js */
/* begin plugin settings page. */



// easter egg admin settings page actions
register_activation_hook(__FILE__, 'add_defaults_fn');
add_action('admin_init', 'monkeytaco_admin_init_fn' );
add_action('admin_menu', 'monkeytaco_admin_add_page_fn');

// Register our settings. Add the settings section, and settings fields
function monkeytaco_admin_init_fn(){
	register_setting('plugin_options', 'plugin_options');
	add_settings_section('monkeytaco_main_section', 'Choose your easter egg', 'monkeytaco_section_text_fn', __FILE__);
	add_settings_field('monkeytaco_drop_down1', 'Which would you like?', 'monkeytaco_setting_dropdown_fn', __FILE__, 'monkeytaco_main_section');
}

// Add sub page to the Settings Menu
function monkeytaco_admin_add_page_fn() {
	add_options_page('Easter Eggs Options Page', 'Easter Eggs', 'administrator', __FILE__, 'monkeytaco_options_page_fn');
}

// ************************************************************************************************************

// Callback functions

// Section HTML, displayed before easter egg selection
function  monkeytaco_section_text_fn() {
	echo '<p>You can see a demo here (link) or take a look at the screenshots above.</p>';
}

// the dropdown select
function  monkeytaco_setting_dropdown_fn() {
	$options = get_option('plugin_options');
	$items = array("mk" => "Mortal Kombat blood code", "ko" => "the Konami Code");
	echo "<select id='monkeytaco_drop_down1' name='plugin_options[dropdown1]'>";
	foreach($items as $item) {
		$selected = ($options['dropdown1']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}



// Display the admin options page
function monkeytaco_options_page_fn() {
?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Monkeytaco Easter Eggs</h2>
		...some screenshots here of the animations
		<form action="options.php" method="post">
		<?php settings_fields('plugin_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>
	</div>
<?php
}
