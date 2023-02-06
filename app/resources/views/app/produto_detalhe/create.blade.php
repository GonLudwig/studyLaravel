@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Novo - Protudo Detalhe</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
                <li><a href="{{ route('produto-detalhe.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection