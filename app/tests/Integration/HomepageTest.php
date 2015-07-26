<?php  namespace Starter\tests\Integration;

use Starter\tests\IntegrationTestCase;


/**
 * HomepageTest
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2015 Bruno Barros
 */
class HomepageTest extends IntegrationTestCase{



    /** @test */
    public function it_verifies_that_pages_load_properly()
    {
        $this->visit('/')
        ->andSee('Template: Sticky');
    }
}