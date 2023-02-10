@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Visualizar Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $pedido->id }}</td>
                    </tr>
                    <tr>
                        <td>Cliente:</td>
                        <td>{{ $pedido->cliente->nome }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection