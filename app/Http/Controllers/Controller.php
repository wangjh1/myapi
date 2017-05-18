<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function index()
    {
        echo 33322;
        return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        //return response();
    }
}
