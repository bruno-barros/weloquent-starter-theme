<?php namespace Starter\Support;

use Illuminate\Support\Facades\View;

/**
 * Comments
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
class Comments
{


	public function item($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ('div' == $args['style'])
		{
			$tag       = 'div';
			$add_below = 'comment';
		}
		else
		{
			$tag       = 'li';
			$add_below = 'div-comment';
		}

		echo View::make('partials.comments.item', compact('args', 'tag', 'add_below', 'comment', 'depth'))->render();

	}

}