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

/**
 * ---------------------------------------------------
 * Sanitize uploaded files
 * ---------------------------------------------------
 */
add_filter( 'sanitize_file_name', function($filename){

	return filter_var($filename, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

}, 10 );

/**
 * ----------------------------------------------------------
 * Improves the WordPress caption shortcode with HTML5 figure
 * & figcaption, microdata & wai-aria attributes
 * ----------------------------------------------------------
 *
 * @param  string $val Empty
 * @param  array $attr Shortcode attributes
 * @param  string $content Shortcode content
 * @return string          Shortcode output
 */
add_filter('img_caption_shortcode', function ($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr));

	// No caption, no dice...
	if (1 > (int)$width || empty($caption))
	{
		return $val;
	}

	if ($id)
	{
		$id = esc_attr($id);
	}

	// Add itemprop="contentURL" to image - Ugly hack
	$content = str_replace('<img', '<img itemprop="contentURL"', $content);

	return '<figure id="' . $id .
	'" aria-describedby="figcaption_' . $id .
	'" class="wp-caption ' . esc_attr($align) .
	'" itemscope itemtype="http://schema.org/ImageObject" style="max-width: ' . (0 + (int)$width) . 'px">' .
	do_shortcode($content) .
	'<figcaption id="figcaption_' . $id .
	'" class="wp-caption-text" itemprop="description">' . $caption .
	'</figcaption></figure>';

}, 10, 3);