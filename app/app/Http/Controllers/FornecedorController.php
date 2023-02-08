<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::with(['produto'])->where('nome', 'like', "%{$request->input('nome')}%")
            ->where('site', 'like', "%{$request->input('site')}%")
            ->where('uf', 'like', "%{$request->input('uf')}%")
            ->where('email', 'like', "%{$request->input('email')}%")
            ->simplePaginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
        $message = '';

        $rules = [
            'nome' => 'required|max:40',
            'site' => 'required|max:40',
            'uf' => 'required|max:2',
            'email' => 'required|email'
        ];

        $feedback = [
            'required' => 'O campo :attribute e obrigatorio',
            'max' => 'O limite maximo de caracteres para o campo :attribute e 40.',
            'email' => 'Digite um e-mail valido.',
            'uf.max' => 'O limite maximo de caracteres e 2.'
        ];

        if ($request->input('_token') && !$request->input('id')) {

            $request->validate($rules, $feedback);

            Fornecedor::create($request->all());

            $message = 'Fornecedor cadastrado com sucesso!';
        }

        if ($request->input('_token') && $request->input('id')) {
            
            $request->validate($rules, $feedback);

            $update = Fornecedor::find($request->input('id'))->update($request->all());
            
            $message = 'Houve um erro na atualizacao.';

            if ($update) {
                $message = 'Fornecedor atualizado com sucesso!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'message' => $message]);
        }

        return view('app.fornecedor.adicionar',['message' => $message]);
    }

    public function editar($id, $message = '') {
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'message' => $message]);
    
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
