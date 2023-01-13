<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rota1Controller extends Controller
{
    public function teste($p1, $p2) {
        return view('site.teste', compact('p1', 'p2'));
    }
}
