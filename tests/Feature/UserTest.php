<?php

namespace Tests\Feature;

use App\Model\Game;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
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
        $game = factory(Game::class)->make();
        $games = factory(Game::class, 3)->make();


        $game = factory(Game::class)->make([
            'name' => 'Unreal',
            'email' => 'something@example.com'
        ]);

        $result = factory(Game::class)->create();
        $result = factory(Game::class, 3)->create();

        $game = factory(Game::class)->create([
            'id' => 11
        ])->each(function ($model) {
            $model->publishers()->saveMany(
                factory(Publisher::class, 2)->make()
            );
        });

        print_r($game->publishers);

        $this->assertTrue(true);

        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
