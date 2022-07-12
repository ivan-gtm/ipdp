<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Controller as BaseController;

class DummyController extends BaseController
{
    public function dummyMethod(Request $request)
    {
        // $password = Hash::make('alex');

        // echo $password;


        if (Auth::check()) {
            $user = Auth::user();

            print_r($user);
            die();
        }
        else {

            echo 'No login';
        }
    }
}
