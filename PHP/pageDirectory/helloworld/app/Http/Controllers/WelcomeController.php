<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('welcome');
    }
    /*
    public function __invoke()
    {
        $request = app (Request::class);
        or
        $request = app()->make(Request::class);

        return get_class($request);
    }
    */
}
