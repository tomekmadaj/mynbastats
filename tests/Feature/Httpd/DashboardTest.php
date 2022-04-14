<?php

namespace Tests\Feature\Httpd;

use App\Model\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DashboardTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        //chcemy żeby serwer zwrócił wartość 200 czyli wszystko ok
        $response->assertStatus(200);
    }

    public function testDashboardShowing()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertStatus(200);
    }

    public function testDashboardShowingWithExtraData()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->withCookies(['best-game' => 'Duke Nuken 3D'])
            ->withSession(['publisher' => '3D Realms'])
            ->get('/');

        $response->assertStatus(200);
    }
}
