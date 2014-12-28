<?php
/**
 * ----------------------------------
 * Assets management
 * ----------------------------------
 * @link https://github.com/Giuseppe-Mazzapica/Occipital
 *
 * Assets::addStyle( 'my-style' )
 *
 * ->src( Config::get('assets.css.url').'/layout.css' )
 *
 * ->deps(['wp-color-picker' ])
 *
 * // replace following with real ids of the style you merged
 * ->provide( [ 'dashicons', 'admin-bar', 'bootstrap', 'fontawesome' ] )
 *
 * ->ver( filemtime( '/srv/www/wp/wp-content/themes/my/style.css' ) )
 *
 * ->after( 'body { height: 100%; }' )
 *
 * ->media( 'screen' )
 *
 * ->isFooter( false )
 *
 * ->condition( function( WP_Query $query, $user ) {
 *
 * return $query->is_page( 'special-page' ) && user_can( $user, 'edit_pages' );
 *
 * });
 */

use Weloquent\Facades\Assets;

add_action('brain_loaded', function ()
{
	$env    = App::getFacadeApplication()['env'];
	$ver    = Config::get('assets.ver');
	$cssUrl = Config::get('assets.css.url');
	$jsUrl  = Config::get('assets.js.url');

	// provided assets to replace plugins injections
	$providedCss = ['select2'];
	$providedJs = ['select2'];

	Assets::addFrontStyle('bootstrap-style-front')
		->src($cssUrl . '/bootstrap.css')
		->ver($ver)
		->provide( $providedCss )
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	Assets::addFrontStyle('layout-front')
		->src($cssUrl . '/layout.css')
		->deps(['bootstrap-style-front'])
		->ver($ver)
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	Assets::addFrontStyle('modules-front')
		->src($cssUrl . '/modules.css')
		->deps(['layout-front'])
		->ver($ver)
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	Assets::addFrontStyle('pages-front')
		->src($cssUrl . '/pages.css')
		->deps(['modules-front'])
		->ver($ver)
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	/**
	 * ----------------------------------------------
	 * Assets on PRODUCTION environment
	 * ----------------------------------------------
	 * Styles
	 */
	Assets::addFrontStyle('styles-front')
		->src($cssUrl . '/_global.css')
		->ver($ver)
		->provide( $providedCss )
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'production';
		});

	/**
	 * ----------------------------------------------
	 * Assets on LOCAL environment
	 * ----------------------------------------------
	 * Scripts
	 */
	Assets::addFrontScript('bootstrap-script-front')
		->src($jsUrl . '/bootstrap.min.js')
		->deps(['jquery'])
		->ver($ver)
		->provide( $providedJs )
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	Assets::addFrontScript('page-all-front')
		->src($jsUrl . '/page.all.js')
		->deps(['bootstrap-script-front'])
		->ver($ver)
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'local';
		});

	/**
	 * ----------------------------------------------
	 * Assets on PRODUCTION environment
	 * ----------------------------------------------
	 * Scripts
	 */
	Assets::addFrontScript('jquery-front')
		->src($jsUrl . '/_global.js')
		->provide(['jquery'])
		->ver($ver)
		->provide( $providedJs )
		->condition(function (WP_Query $query, $user) use ($env)
		{
			return $env === 'production';
		});

});

