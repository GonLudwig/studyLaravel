<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {

        $motivoContato = MotivoContato::all();

        return view('site.principal', ['titulo' => 'Home', 'motivoContato' => $motivoContato]);
    }
}
