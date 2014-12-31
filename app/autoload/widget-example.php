<?php

use Illuminate\Support\Facades\View;

add_action('widgets_init', function ()
{
	register_widget('Example_Widget');
});

/**
 * Example_Widget
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
class Example_Widget extends WP_Widget
{
	public function __construct()
	{

		$params = array(

			'name'        => 'Example by Starter theme',
			'description' => 'Show a partial template with last posts.',

		);

		parent::__construct('Example_Widget', '', $params);

	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{

		echo $args['before_widget'];

		$oPosts = new WP_Query('posts_per_page=5');
		$posts = $oPosts->posts;

		wp_reset_postdata();

		echo View::make('widgets.example', compact('posts'))->render();

		echo $args['after_widget'];
	}
}