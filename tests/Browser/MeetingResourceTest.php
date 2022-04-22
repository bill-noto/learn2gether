<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MeetingResourceTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testMeetingResource()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'admin1@admin.com')
                ->type('#password', 'password123')
                ->press('button[type=submit]')
                ->pause(1000)
                ->visit('/hosts')
                ->press('Request Meeting')
                ->pause(1000)
                ->assertSee('Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod')
                ->keys('#date', '11', '11', '2022', '{tab}', '12', '30')
                ->press('Request Meeting')
                ->pause(1000)
                ->assertPathIs('/meetings')
                ->press('DELETE')
                ->acceptDialog()
                ->pause(1000)
                ->assertSee('Your Meetings, Admin One');
        });
    }
}
