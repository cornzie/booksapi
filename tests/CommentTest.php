<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    /**
     * Test that an anon comment can be posted.
     *
     * @return void
     */
    public function test_that_comment_can_be_saved()
    {
        $this->json('POST', 'books/1/comments', ["comment" => "This is yet another nice book"])
            ->seeInDatabase('comments', ['comment' => 'This is yet another nice book'])
            ->seeJsonStructure([
                "status",
                "data"
             ]);
    }
    
    /**
     * test_get_comments_for_a_book
     *
     * @return void
     */
    public function test_get_comments_for_a_book()
    {
        $response = $this->call('GET', '/books/1/comments');
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'status',
            'data'
        ]);
    }
}
