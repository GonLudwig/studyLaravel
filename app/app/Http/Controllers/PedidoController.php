<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::simplePaginate(10);

        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all([
            'id',
            'nome'
        ]);

        return view('app.pedido.create', ['clientes' => $clientes]);
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
            'cliente_id' => 'required|exists:clientes,id'
        ];

        $feedback = [
            'required' => 'O compo :attribute é obrigatorio.',
            'fornecedor_id.exists' => 'A opção selecionada não existe.'
        ];

        $request->validate($rules, $feedback);

        Pedido::create($request->all());

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('app.pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all([
            'id',
            'nome'
        ]);

        return view('app.pedido.edit', [
            'pedido' => $pedido,
            'clientes' => $clientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $rules = [
            'cliente_id' => 'required|exists:clientes,id'
        ];

        $feedback = [
            'required' => 'O compo :attribute é obrigatorio.',
            'fornecedor_id.exists' => 'A opção selecionada não existe.'
        ];

        $request->validate($rules, $feedback);

        $pedido->update($request->all());

        return redirect()->route('pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedido.index');
    }
}
