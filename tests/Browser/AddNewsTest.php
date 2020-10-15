<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/news')
                    ->visit('admin/news/create')
                    ->type('title', '')
                    ->type('text', 'testText news')
                    ->press('Создать')
                    ->assertSee('поле заголовок новости должно быть заполнено')
                    ->assertPathIs('admin/news');
        });
    }
}
