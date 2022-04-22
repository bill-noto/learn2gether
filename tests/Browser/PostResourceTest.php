<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostResourceTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testPostResource()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'admin1@admin.com')
                ->type('#password', 'password123')
                ->press('button[type=submit]')
                ->pause(1000)
                ->visit('/posts')
                ->press('Create a Post')
                ->pause(1000)
                ->assertPathIs('/posts/create')
                ->select('author', 'Admin One')
                ->type('input#title', 'This is a test.')
                ->type('textarea#content', 'This is a test yay.')
                ->press('Create Post')
                ->pause(1000)
                ->assertPathIs('/posts')
                ->press('DELETE')
                ->acceptDialog()
                ->pause(1000)
                ->assertSee('Your Posts, Admin One');
        });
    }
}
