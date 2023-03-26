<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function pageNotFound()
    {
        return view('error.404');
    }
}
