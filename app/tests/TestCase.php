<?php namespace Starter\Tests;

class TestCase extends \Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		$paths = require SRC_PATH . '/bootstrap/paths.php';

		$appInit = $paths['framework'] . '/Core/LaravelApplication.php';
//		dd(file_exists($appInit));


		return require $appInit;
	}

}
