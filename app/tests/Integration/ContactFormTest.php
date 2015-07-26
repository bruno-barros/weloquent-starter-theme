<?php  namespace Starter\tests\Integration;

use Starter\tests\IntegrationTestCase;


/**
 * ContactFormTest
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2015 Bruno Barros
 */
class ContactFormTest extends IntegrationTestCase{

    /** @test */
    public function should_see_error_if_form_has_not_filled()
    {
        $this->visit('/contact')
             ->press('Send message')
             ->andSee('The name field is required.')
             ->onPage('/contact');
    }


    /** @test */
    public function should_see_email_required_filling_just_name()
    {
        $this->visit('/contact')
            ->type('My Name', 'name')
            ->press('Send message')
            ->notSee('The name field is required.')
            ->see('The email field is required.')
            ->onPage('/contact');
    }

}