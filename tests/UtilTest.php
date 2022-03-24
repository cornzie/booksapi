<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UtilTest extends TestCase
{
    /**
     * Test that the base endpoint is accessible.
     *
     * @return void
     */
    public function test_that_base_endpoint_returns_a_successful_response()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

   
}
