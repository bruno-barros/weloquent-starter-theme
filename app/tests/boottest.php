<?php
define( 'WPINC', 'wp-includes' );
define( 'THEME_TEST_ENV', true );
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/**
 * root level of the application
 */
$root = __DIR__ . '/../../../../..';


require $root . '/src/bootstrap/start.php';

require_once $root . '/vendor/phpunit/phpunit/PHPUnit/Framework/Assert/Functions.php';
