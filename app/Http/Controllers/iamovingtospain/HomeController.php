<?php

namespace App\Http\Controllers\iamovingtospain;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $facebookToken = env('FACEBOOK_ACCESS_TOKEN');
        return view('iamovingtospain.iamovingtospain', [
            'facebookToken' => $facebookToken
        ]);
    }
}