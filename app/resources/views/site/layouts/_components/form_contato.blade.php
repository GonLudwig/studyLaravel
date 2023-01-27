{{ $slot }}
<div>
    <pre>
        {{-- {{ print_r($errors) }} --}}
    </pre>
</div>
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $borda }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $borda }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borda }}">
    <br>
    <select name="motivo_contato" class="{{ $borda }}">
        <option sele value="">Qual o motivo do contato?</option>
        @foreach ($motivoContato as $key => $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contato') == $motivo->id ? 'selected' : '' }}> {{ $motivo->motivo_contato }} </option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>