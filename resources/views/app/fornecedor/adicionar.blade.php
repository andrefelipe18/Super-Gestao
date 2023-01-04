@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Forncedor Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                 <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }} ">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" value="{{ $fornecedor->nome ?? old('nome') }}"class="borda-preta">
                    @if($errors->has('nome')){{ $errors->first('nome') }}@endif
                    <input type="text" name="site" placeholder="Site" value="{{ $fornecedor->site ?? old('site') }}" class="borda-preta">
                    @if($errors->has('site')){{ $errors->first('site') }}@endif
                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}"placeholder="UF" class="borda-preta">
                    @if($errors->has('uf')){{ $errors->first('uf') }}@endif
                    <input type="text" name="email" placeholder="E-mail" value="{{$fornecedor->email ?? old('email') }}"class="borda-preta">
                    @if($errors->has('email')){{ $errors->first('email') }}@endif
                    <button type="submit" class="borda-preta" style="background-color: blue;">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
