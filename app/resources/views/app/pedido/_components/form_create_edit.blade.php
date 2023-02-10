@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
@endif
    @csrf
    <select name="cliente_id" class="borda-preta">
        <option value="0">-- Selecione o cliente --</option>
        @foreach ($clientes as $cliente)
            <option {{ old('cliente_id') == $cliente->id }} value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>