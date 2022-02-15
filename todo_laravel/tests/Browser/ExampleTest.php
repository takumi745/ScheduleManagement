<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
/** use Laravel\Dusk\Browser; **/
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /**$this->browse(function (Browser $browser) {
            $browser->visit('/test_todo');
        });**/
        $this->browse(function ($browser){
            $browser->visit('/test_todo');
                    /**->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');**/
        });
    }
}
