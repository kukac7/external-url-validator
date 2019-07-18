<?php

namespace Kukac7\ExternalUrlValidator\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController
{

    public function validate(Request $request) {
        $validator = Validator::make($request->all(), [
            'url' => 'url',
        ]);

        $url = $validator->validate();

        $client = new Client();

        try {
            $response = $client->get($request->input('url'));
        } catch (\Exception $e) {
            return ['success'=>false];
        }

        $statusCode = $response->getReasonPhrase();

        return ['success'=>true];
    }
}
