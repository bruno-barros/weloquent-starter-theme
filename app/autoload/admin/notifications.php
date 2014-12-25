<?php
/**
 * Hide updates notifications
 */
add_action('after_setup_theme', function ()
{
	/**
	 * Remove Core updates
	 */
	add_filter('pre_site_transient_update_core', '__return_null');

	/**
	 * remove Plugins updates
	 */
//	add_filter('pre_site_transient_update_plugins', '__return_null');

	/**
	 * Remove Themes updates
	 */
	add_filter('pre_site_transient_update_themes', '__return_null');
});