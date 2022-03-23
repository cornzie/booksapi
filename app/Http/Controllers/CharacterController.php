<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;
use App\Services\CharacterService;
use App\Services\FormatResponseService;

class CharacterController extends Controller
{
    use CharacterService, FormatResponseService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        $params = [
            'name' => $request->has('name') ? $request->input('name') : null,
            'gender' => $request->has('gender') ? $request->input('gender') : null,
            'born' => $request->has('age') ? $request->input('age') : null,
        ];

        $order = $request->has('order') ? $request->input('order') : 'ASC';

        return $this->allCharacters($params, $order) !== false ? response($this->format('success',$this->allCharacters($params, $order), 200)) : response($this->format('error'), 500);
    }

}
