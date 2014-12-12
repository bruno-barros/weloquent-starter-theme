<?php  namespace Starter\tests\Unit;

use Starter\Tests\TestCase;

/**
 * ExampleTest
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class ExampleTest extends TestCase{

	/**
	 * @test
	 */
	public function it_should_be_true()
	{
		dd('damaged');
		$this->assertEquals(1, 1);
	}

}