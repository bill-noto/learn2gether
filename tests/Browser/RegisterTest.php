<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->typeSlowly('#first_name', 'Mike')
                ->typeSlowly('#last_name', 'Doe')
                ->typeSlowly('#username', 'mikethedoe')
                ->typeSlowly('#email', 'mike@doe.com')
                ->typeSlowly('#password', 'password')
                ->typeSlowly('#password_confirmation', 'password')
                ->select('role', 'patron')
                ->press('button[type=submit]')
                ->pause(1000)
                ->visit('/')
                ->assertSee('Learn While Having Fun');
        });
    }
}
