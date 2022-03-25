<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

trait CharacterService
{

    use APIService;

    public function allCharacters(array $params, string $order = 'ASC', $pageSize = 50)
    {
        // Hello
        // https://www.anapioficeandfire.com/api/characters?pageSize=20

        
        $params['pageSize']  = $pageSize;

        if ($response = $this->getIceAndFire('characters', $params)) {

            // 
            // Get the last link -> cos it has the last page number - strrchr
            // Get the page parameter
            // extract it's value

            $lastPage = (int) explode('=', explode('&', substr(strrchr($response['header'][0], ','), 1))[1])[1];

            $characters = collect($response['body']);

            $characters = $order === 'ASC' ? $characters->sortBy('name') : $characters->sortByDESC('name');
            return [
                'characters' => $characters->values()->all(),
                'meta' => [
                    'current_result_count' => $characters->count(),
                    'total' => ($characters->count()) < $pageSize ? ($characters->count()) : $lastPage*50,
                    'links' => $response['header'],
                    ]
                ];
        }

        return false;
    }
}
