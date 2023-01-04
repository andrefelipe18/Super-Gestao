{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome')){{ $errors->first('nome') }}@endif
    <br>
    <input type="text" value="{{ old('telefone') }}" name="telefone" placeholder="Telefone" class="{{ $classe }}">
    @if($errors->has('telefone')) {{ $errors->first('telefone') }} @endif
    <br>
    <input type="text" name="email" value="{{ old('email') }}"  placeholder="E-mail" class="{{ $classe }} ">
    @if($errors->has('email')) {{ $errors->first('email') }} @endif
    <br>
    <select class="{{ $classe }}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato))
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id')) {{ $errors->first('motivo_contatos_id') }} @endif
    <br>
    <textarea class="{{ $classe }}" name="mensagem">@if(old('mensagem') != ''){{ old('mensagem') }}@else Preencha aqui a sua mensagem @endif
    </textarea>
    @if($errors->has('mensagem')) {{ $errors->first('mensagem') }} @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
    <div class="info" style="">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
        @endforeach
    </div>
@endif
