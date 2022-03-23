<?php

namespace App\Services;
use GuzzleHttp\Client;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

trait FormatResponseService{

    public function format(string $status = 'success', array $data = [])
    {
        return [
            'status' => $status,
            'data' => $data,
        ];
    }
}