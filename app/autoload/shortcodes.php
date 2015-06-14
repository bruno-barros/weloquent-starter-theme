<?php
add_action('init', function ()
{

	/**
	 * Register your shortcode as you would normally.
	 * This is a simple example for a pullquote with a citation.
	 */
	add_shortcode('pullquote', function ($attr, $content = '')
	{

		$attr = wp_parse_args($attr, array(
			'source' => ''
		));

		ob_start();

		?>

		<blockquote class="pullquote">
			<?php echo esc_html($content); ?><br/>
			<?php if (!empty($attr['source'])) : ?>
				<cite><em><?php echo esc_html($attr['source']); ?></em></cite>
			<?php endif; ?>
		</blockquote>

		<?php

		return ob_get_clean();
	});

	/**
	 * Register your shortcode as you would normally.
	 * This is a simple example for a pullquote with a citation.
	 */
	add_shortcode('my_attach', function ($attr, $content = '')
	{

		$attr = wp_parse_args($attr, array(
			'posts' => ''
		));

		ob_start();

		?>

		<div class="well">
			<h3><?php echo esc_html($attr['title']); ?></h3>
			<?php echo esc_html($content); ?><br/>
			<?php if (!empty($attr['posts'])) : ?>
				<?php //foreach ($attr['posts'] as $p): ?>
					<em><?php echo esc_html($attr['posts']); ?></em><br>
				<?php// endforeach; ?>
			<?php endif; ?>
		</div>

		<?php

		return ob_get_clean();
	});

	/**
	 * Register a UI for the Shortcode.
	 * Pass the shortcode tag (string)
	 * and an array or args.
	 */
	if (is_admin() && function_exists('shortcode_ui_register_for_shortcode'))
	{
		shortcode_ui_register_for_shortcode(
			'pullquote',
			array(

				// Display label. String. Required.
				'label'         => 'Pullquote',

				// Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
				'listItemImage' => 'dashicons-editor-quote',

				// Available shortcode attributes and default values. Required. Array.
				// Attribute model expects 'attr', 'type' and 'label'
				// Supported field types: text, checkbox, textarea, attachment, radio, select, email, url, number, and date.
				'attrs'         => array(
					array(
						'label' => 'Quote',
						'attr'  => 'content',
						'type'  => 'textarea',
					),
					array(
						'label'       => 'Cite',
						'attr'        => 'source',
						'type'        => 'text',
						'placeholder' => 'Firstname Lastname',
						'description' => 'Optional',
					),
				),
			)
		);

		shortcode_ui_register_for_shortcode(
			'my_attach',
			array(

				// Display label. String. Required.
				'label'         => 'My Posts',

				// Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
				'listItemImage' => 'dashicons-forms',

				// Available shortcode attributes and default values. Required. Array.
				// Attribute model expects 'attr', 'type' and 'label'
				// Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
				'attrs'         => array(
					array(
						'label' => 'Título',
						'attr'  => 'title',
						'type'  => 'text',
					),
					array(
						'label'       => 'Posts',
						'attr'        => 'posts',
						'type'        => 'select',
						'options'     => array( // List of options  value => label
							'1' => __('One', 'l10n-domain'),
							'2' => __('Two', 'l10n-domain'),
						),
						'description' => 'Optional',
					),
				),
			)
		);
	}

});