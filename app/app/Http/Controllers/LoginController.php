<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $error = $request->get('error');

        return view('site.login', ['titutlo' => 'Login', 'error' => $error]);
    }

    public function autenticar(Request $request) {
        $rules = [
            'usuario' => 'required|email',
            'password' => 'required|min:6|max:12'
        ];

        $feedback = [
            'required' => 'O campo :attribute e obrigatorio.',
            'password.min' => 'Password precisa conter no minimo 6 caracteres.',
            'password.max' => 'Password precisa conter no maximo 12 caracteres.', 
            'usuario.email' => 'Este campo precisa conter um e-mail valido.'
        ];

        $request->validate($rules, $feedback);

        $usario = $request->get('usuario');
        $password = $request->get('password');

        $user = User::where('email', $usario)->where('password', $password)->get()->first();

        if (isset($user->name)) {
            return print_r($user);
        }

        return redirect()->route('site.login', ['error' => 'Usuario inexistente.']);
    }
}
