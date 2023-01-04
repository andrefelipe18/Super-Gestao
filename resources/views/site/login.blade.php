@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            {{-- @component('site.layouts._components.alerta', ['tipo' => 'danger'])
                <p><strong>Erro: </strong> Usuário ou senha inválidos</p>
            @endcomponent --}}
            <form action="{{ route('site.login') }}" method="POST">
                @csrf
                <input type="text" name="usuario" value="{{ old('usuario') }}" class="borda-preta" placeholder="Usúario: " required>
                @if($errors->has('usuario')){{ $errors->first('usuario') }}@endif
                <input type="password" name="senha" value="{{ old('password') }}" class="borda-preta" placeholder="Senha: " required>
                @if($errors->has('senha')){{ $errors->first('senha') }}@endif
                <button type="submit" class="borda-preta">Acessar</button>
            </form>
            {{ isset($erro) && $erro != '' ? $erro : ''  }}
        </div>
    </div>
</div>

@endsection
