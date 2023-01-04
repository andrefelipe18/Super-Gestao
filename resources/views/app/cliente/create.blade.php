@extends('app.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Adicionar Cliente</p>
        </div>

        <div class="menu">
            <ul>
                 <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
               @component('app.cliente._components.form_create_edit', [])
               @endcomponent -
            </div>
        </div>
    </div>
@endsection
