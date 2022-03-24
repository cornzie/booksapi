<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CharacterTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_base_endpoint_returns_a_successful_response()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_get_all_books_endpoint_returns_success()
    {
        $response = $this->call('GET', '/books');

        $this->assertEquals(200, $response->status());
    }
}
