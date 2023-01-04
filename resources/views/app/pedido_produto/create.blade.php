@extends('app.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                 <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
                <p>
                    <b>ID do pedido: </b> {{ $pedido->id }} <br>
                    <b>Cliente: </b> {{ $pedido->cliente->nome }} <br>
                </p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
