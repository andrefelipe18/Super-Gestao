<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\Item;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Método para buscar os dados usando eager loading
        $produtos = Item::with(['produtoDetalhe', 'fornecedor'])->paginate(3); //

        //Retornar a view com os dados
        return view('app.produto.index', ['titulo' => 'Listar Fornecedores', 'produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validação dos dados
        $regras = [
            'nome' => 'required',
            'descricao' => 'required|min:3',
            'peso' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id'
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'peso.required' => 'O campo peso é obrigatório',
            'peso.numeric' => 'O campo peso deve ser um valor numérico',
            'unidade_id.numeric' => 'O campo unidade deve ser um valor numérico',
            'unidade_id.exists' => 'O campo unidade deve ser um valor existente na tabela unidades',
            'unidade_id.required' => 'O campo unidade é obrigatório'
        ];
        $request->validate($regras, $mensagens);


        //Inserindo os dados no banco de dados
        Produto::create($request->all());

        //Redirecionando para a rota index
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {


        //Retornando a view com os dados
        return view('app.produto.show', ['titulo' => 'Visualizar Produto', 'produto' => $produto,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        // Retornando a view com o formulário de edição
        return view('app.produto.edit', ['titulo' => 'Editar Produto', 'produto' => $produto,  'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);

        //dd($request->all());
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
