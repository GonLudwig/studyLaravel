{{ $slot }}

<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $borda }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $borda }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borda }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $borda }}">
        <option sele value="">Qual o motivo do contato?</option>
        @foreach ($motivoContato as $key => $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}> {{ $motivo->motivo_contato }} </option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" class="{{ $borda }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>