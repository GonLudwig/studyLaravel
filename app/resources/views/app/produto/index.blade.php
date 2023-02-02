@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Produto - Consulta</p>
        </div>
        <div class="menu">
            <ul>
                {{-- <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li> --}}
                {{-- <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li> --}}
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $protudo)
                            <tr>
                                <td>{{ $protudo->nome }}</td>
                                <td>{{ $protudo->descricao }}</td>
                                <td>{{ $protudo->peso }}</td>
                                <td>{{ $protudo->unidade_id }}</td>
                                <td><a href="">Excluir</a></td>
                                <td><a href="">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection