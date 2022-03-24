<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Services\FormatResponseService;

class BookAPIController extends Controller
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
        return response([
            "salute" => 'Welcome to Books API',
            "version" => '0.0.0',
        ], 200);
    }


}
