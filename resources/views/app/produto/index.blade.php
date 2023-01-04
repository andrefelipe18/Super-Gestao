@extends('app.layouts.basico')

@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                {{--  Fazendo a listagem dos produtos --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? ''}}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td style="background-color: green; color: white;"> <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a> </td>
                                <td style="background-color: red; color: white;">
                                    <form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                   <p>Exibir o ID do Pedido(s)</p>
                                    Pedido:
                                    @foreach ($produto->pedidos as $pedido)
                                    <a href="{{ route('pedido-produto.create', ['pedido'=> $pedido->id]) }}">
                                    {{ $pedido->id }},
                                    </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $produtos->appends($request)->links() }}
            <br>
            Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            <br>
        </div>
    </div>
    <script>

    </script>
@endsection
