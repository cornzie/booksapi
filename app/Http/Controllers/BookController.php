<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Services\FormatResponseService;

class BookController extends Controller
{
    use BookService, FormatResponseService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return $this->allBooks() !== false ? response($this->format('success', $this->allBooks()), 200) : response($this->format('error'), 500);
    }

    public function find()
    {
        //
    }

    public function storeComments(Request $request, $book)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:500'
        ]);

        try{
            
            if($comment = Comment::create([
                'comment' => $request->comment,
                'ip_address' => $request->ip(),
                'book_id' => $book,
            ]))
            {
                return response($this->format('success', $comment->toArray()), 201);
            }

        } catch(Throwable $th)
        {
            Log::debug('StoreCommentFailed', [
                'line' => __LINE__,
                'file' => __FILE__,
                'exception' => $th->getMessage()
            ]);

            return response($this->format('error'), 500);
        }
    }

    public function comments($book)
    {
        try{
            $comments = Comment::where('book_id', $book)->orderBy('created_at', 'DESC')->get();

            if($comments->isNotEmpty())
            {
                return response($this->format('success', $comments->toArray()), 200);
            }

            return response($this->format('success', $comments->toArray()), 404);

        } catch(Throwable $th)
        {
            Log::debug('FetchCommentsFailed', [
                'line' => __LINE__,
                'file' => __FILE__,
                'exception' => $th->getMessage()
            ]);

            return response($this->format('error'), 500);
        }
    }

    public function characters()
    {
        //
    }

}
