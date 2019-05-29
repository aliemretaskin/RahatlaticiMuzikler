<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{

    private $token = '5CSvJo188UQjxis2rseQcPhmmAqcqLzmaPWq0GXx';

    /**
     * Token generate testing.
     */
    public function testCreateToken()
    {
        $response = $this->json('GET', '/api/v1/token');
        
        $response
            ->assertStatus(200)
            ->assertJson(['status' => true])
            ->assertSee('token');
    }

    /*
        Permission and favorite testing.
     */
    public function testFavoriteList()
    {
        $this->json('GET', '/api/v1/favorites')->assertStatus(401);
        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'abc',
        ])->json('GET', '/api/v1/favorites')->assertStatus(403);

        $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $this->token,
        ])->json('GET', '/api/v1/favorites')->assertStatus(200);

    }

}
