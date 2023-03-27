<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function page_not_found()
    {
        return view('error.404');
    }

    public function not_allowed_here()
    {
        return view('error.403');
    }
}
