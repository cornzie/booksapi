<?php

namespace App\Services;
use GuzzleHttp\Client;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

trait BookService{

    use APIService;

    public function allBooks()
    {
        $books = [];
        // Hello
        // https://www.anapioficeandfire.com/api/books?pageSize=20

        if($response = $this->getIceAndFire('books', [
            'pageSize' => 20
        ]))
        {
            for($key = 0; $key < count($response['body']); $key++){

                $book_id = substr(strrchr($response['body'][$key]['url'],"/"), 1);

                $books[$key]['id'] = $book_id;
                $books[$key]['name'] = $response['body'][$key]['name'];
                $books[$key]['authors'] = $response['body'][$key]['authors'];
                $books[$key]['released'] = $response['body'][$key]['released'];
                $books[$key]['commentCount'] = Comment::where('book_id', $book_id)->count();
                
            }

            $releaseDates = array_column($books, 'released');
            
            // array_multisort
            array_multisort($releaseDates, SORT_ASC, $books);
    
            return $books;
        }

        return false;
        

    }

}