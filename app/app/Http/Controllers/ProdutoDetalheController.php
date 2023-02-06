<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = ProdutoDetalhe::simplePaginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'produto_id' => 'required|exists:produtos,id',
            'comprimento' => 'required',
            'largura' => 'required',
            'altura' => 'required',
            'unidade_id' => 'required|exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O compo :attribute é obrigatorio.'
        ];

        $request->validate($rules, $feedback);

        ProdutoDetalhe::create($request->all());

        return 'Cadastro realizado com sucesso';
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        return view('app.produto.show', ['produto_detalhe' => $produto_detalhe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $rules = [
            'produto_id' => 'required|exists:produtos,id',
            'comprimento' => 'required',
            'largura' => 'required',
            'altura' => 'required',
            'unidade_id' => 'required|exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O compo :attribute é obrigatorio.'
        ];

        $request->validate($rules, $feedback);

        $produto_detalhe->update($request->all());

        return 'Cadastro realizado com sucesso';
        return redirect()->route('produto-detalhe.show', ['produto_detalhe' => $produto_detalhe]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
