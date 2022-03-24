<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    /**
     * Test that all books are coming through
     *
     * @return void
     */
    public function test_that_get_all_books_endpoint_returns_success()
    {
        $response = $this->call('GET', '/books');

        $this->assertEquals(200, $response->status());
        
        $this->seeJsonStructure([
            'status',
            'data'
        ]);
    }
}
