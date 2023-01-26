{{ $slot }}
<div>
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $borda }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $borda }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $borda }}">
    <br>
    <select name="motivo_contato" class="{{ $borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>