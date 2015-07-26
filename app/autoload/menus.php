<?php
/**
 * ---------------------------------------------------
 * Register our menus
 * ---------------------------------------------------
 */

/**
 * On template use:
 * <code>
 * {{ Menu::render('primary') }}
 * // or
 * <?php echo Menu::render('primary')?>
 * </code>
 */
Menu::add('primary', 'Primary menu',
	array(
		'container'       => 'div',
		'container_class' => 'main-menu',
		'container_id'    => '',
		'menu_class'      => 'nav navbar-nav',
		'menu_id'         => '',
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new \Weloquent\Support\Navigation\BootstrapMenuWalker
	))
	->before('<li><a href="#">Before link</a></li>')
	->after('<li><a href="#">After link</a></li>')
	->remember(0);

/*
 * Default configurations
 */
Menu::add('footer', 'Footer menu');