<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SampleClientController extends Controller
{
    public function getPost() {
        $responses = Http::retry(3, 100)->withQueryParameters(
            [
                '_limit' => 5,
            ]
        )->get('https://jsonplaceholder.typicode.com/posts');
        $posts = [];
        if ($responses->ok() && Str::contains($responses->header('content-type'), 'application/json')) {
            $posts = json_decode($responses->body());
        }
        return view('demo-client', ['posts' => $posts]);
    }
}
