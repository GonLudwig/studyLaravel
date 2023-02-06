@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Editar - Protudo</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
                <li><a href="{{ route('produto-detalhe.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            
            <h4>Produto</h4>
            <br>
            <div>Nome: {{ $produto_detalhe->produto->nome }}</div>
            <div>Descricao: {{ $produto_detalhe->produto->descricao }}</div>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection