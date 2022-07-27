<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            switch ( Auth::user()->rol ) {
                case 'analisis':
                    return redirect()->route('administracion.evaluacionAnalisis')->with('status', 'Bienvenido, equipo analisis !');
                    break;
                
                case 'tecnica':
                    return redirect()->route('administracion.evaluacionTecnica')->with('status', 'Bienvenido, equipo evaluación tecnica !');
                    break;
                
                case 'juridica':
                    return redirect()->route('administracion.evaluacionJuridica')->with('status', 'Bienvenido, equipo evaluación juridica !');
                    break;
                
                default:
                    return redirect()->route('administracion.home')->with('status', 'Bienvenido, equipo analisis !');
                    break;
            }

        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('administracion.registrarUsuario')->with('status', 'Usuario Registrado con exito!');;
    }

    public function create(array $data)
    {
        return User::create([
            'rol' => $data['rol'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            // $user = Auth::user();
            // echo "<pre>";
            // print_r(Auth::id());
            // print_r($user);
            // exit;
            
            return view('auth.dashboard');
        }


        return redirect("login")->withSuccess('are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function borrarUsuario($usuario_id){
        $user = User::find($usuario_id);
        $user->delete();
        
        return redirect()->route('usuariosSistema')->with('status', 'Usuario eliminado con exito!');;
    }
}
