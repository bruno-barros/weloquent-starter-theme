<?php namespace Starter\tests;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

/**
 * IntegrationTestCase
 *
 * @link https://github.com/laracasts/Integrated/wiki/Examples
 *
 * @author       Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2015 Bruno Barros
 */
class IntegrationTestCase extends IntegrationTest
{
    protected $baseUrl = WP_HOME;


    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        \WP_Mock::setUp();
    }


    public function tearDown()
    {

        \WP_Mock::tearDown();
        \Mockery::close();
    }


}