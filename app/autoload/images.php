<?php
/**
 * -----------------------------------
 * Images sizes
 * -----------------------------------
 * @link http://codex.wordpress.org/Function_Reference/add_image_size
 */

/**
 * ---------------------------
 * Add new image sizes
 * ---------------------------
 * add_image_size( [name], [width], [height], [cropped] );
 */
add_image_size('special-size', 100, 50, true);

/**
 * ---------------------------------
 * Register th sizes to admin choose
 * ---------------------------------
 */
add_filter('image_size_names_choose', function ($sizes)
{
	return array_merge($sizes, array(
		'special-size' => __('Your Custom Size Name'),
	));

});
