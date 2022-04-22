<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CommentResourceTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testCommentResourceFromForum()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'admin1@admin.com')
                ->type('#password', 'password123')
                ->press('button[type=submit]')
                ->pause(1000)
                ->visit('/forum')
                ->type('#comment', 'Great Post.')
                ->press('Submit')
                ->assertPathIs('/forum');
        });
    }
}
