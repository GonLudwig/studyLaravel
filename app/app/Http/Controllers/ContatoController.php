<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {

        $motivoContato = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivoContato' => $motivoContato]);
    }

    public function salvar(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
