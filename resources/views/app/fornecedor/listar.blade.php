@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Listagem de Fornecedores</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                {{--  Fazendo a listagem dos forncedores --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td style="background-color: green; color: white;"> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a> </td>
                                <td style="background-color: red; color: white;"> <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a> </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de produtos</p>
                                    <table border="1" style="margin: 15px">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($fornecedor->produtos as $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $fornecedores->appends($request)->links() }}
            <br>
            Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
            <br>
        </div>
    </div>
    <script>

    </script>
@endsection
