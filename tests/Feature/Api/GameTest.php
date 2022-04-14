<?php

namespace Tests\Feature\Api;

use App\Model\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    public function testEmptyList()
    {
        $response = $this->get('/api/games');

        //dump($response->getContent());

        $response->assertStatus(200)
            ->assertJson([
                'current_page' => 1,
                'last_page' => 1,
                'data' => [],
                'total' => 0
                // ...
            ]);
    }

    public function testListWithGames()
    {
        $count = rand(3, 9);
        factory(Game::class, $count)->create();

        $response = $this->get('/api/games?size=10');

        //assertJson json jest konwertowany do tablicy i na tablicy jest sprawdzenie kluczy i ich wartośći
        $response->assertStatus(200)
            ->assertJson([
                'current_page' => 1,
                'last_page' => 1,
                'total' => $count
                // ...
            ]);
    }
}
