<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all([
            'id',
            'nome'
        ]);

        return view('app.pedido-produto.create', [
            'pedido' => $pedido,
            'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $rules = [
            'produto_id' => 'required|exists:produtos,id'
        ];

        $feedback = [
            'required' => 'O compo :attribute é obrigatorio.',
            'exists' => 'A opção selecionada não existe.'
        ];

        $request->validate($rules, $feedback);

        // PedidoProduto::create([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $request->input('produto_id')
        // ]);

        $pedido->produtos()->attach(
            $request->input('produto_id'),
            ['quantidade' => $request->input('quantidade')]
        );

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido $pedido
     * @param  \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {
        // PedidoProduto::where([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $produto->id
        // ])->delete();

        $pedido->produtos()->detach($produto->id);

        return redirect()->route('pedido-produto.create', [ 'pedido' => $pedido->id]);
    }
}
