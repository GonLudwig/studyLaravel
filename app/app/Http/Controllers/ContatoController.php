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

        $validate = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $message = [
            'required' => 'O campo :attribute e obrigatorio.',
            'email' => 'O campo precisar ser um e-mail valido.',
            'nome.min' => 'Quantidade minima de caracteres e 3.',
            'nome.max' => 'Quantidade maxima de caracteres e 40.',
            'nome.unique' => 'Este nome ja esta sendo usado.',
            'mensagem.max' => 'Quantidade maxima de caracteres e 200.',
        ];

        $request->validate($validate, $message);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
