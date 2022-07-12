<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            
            echo 'SESION INICIADA';

            //return redirect()->intended('dashboard');
        }
        else {

            echo 'FALLO LA SESION';
        }
    }
}
