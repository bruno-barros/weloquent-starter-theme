<?php
/**
 * Hide updates notifications
 */
add_action('after_setup_theme', function ()
{
	if (!current_user_can('edit_users'))
	{
		/**
		 * Remove Core updates
		 */
		add_filter('pre_option_update_core', '__return_null');

		/**
		 * remove Plugins updates
		 */
		add_filter('pre_site_transient_update_plugins', '__return_null');

		/**
		 * Remove Themes updates
		 */
		add_filter('pre_site_transient_update_themes', '__return_null');

		add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
	}
});