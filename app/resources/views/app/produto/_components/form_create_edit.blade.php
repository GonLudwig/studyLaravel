@if (isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
@endif
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id" class="borda-preta">
        <option value="0">-- Selecione a unidade de medida --</option>
        @foreach ($unidades as $unidade)
            <option {{ old('unidade_id') == $unidade->id || $unidade->id == $produto->unidade_id ? 'selected' : '' }} value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>