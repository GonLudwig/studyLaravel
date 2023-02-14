<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf
    <select name="produto_id" class="borda-preta">
        <option value="0">-- Selecione o produto --</option>
        @foreach ($produtos as $produto)
            <option {{ old('produto_id') == $produto->id ? 'selected' : ''}} value="{{ $produto->id }}">{{ $produto->nome }}</option>
        @endforeach
    </select>
    <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : '' }}" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>