@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Novo - Pedido Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                {{-- <li><a href="{{ route('pedido.index') }}">Consulta</a></li> --}}
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4> Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table border="1" width="100%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do produto</th>
                            <th>Data de Inclusão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form method="post" id="form_{{$produto->pivot->id}}" action="{{ route('pedido-produto.destroy', ['pedido_id' => $pedido->id, 'pedidoProduto' => $produto->pivot->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido-produto._components.form_create_edit', [
                    'pedido' => $pedido,
                    'produtos' => $produtos
                    ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection