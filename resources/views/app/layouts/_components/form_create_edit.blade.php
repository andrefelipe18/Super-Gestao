@if(isset($produto->id))
<form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
    @csrf
    @method('PUT')
@else
<form action="{{ route('produto.store') }}" method="POST">
@csrf
@endif
<select name="fornecedor_id">
    <option>-- Selecione um Fornecedor --</option>

    @foreach($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }} >{{ $fornecedor->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

<input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}"class="borda-preta">
@if($errors->has('nome')){{ $errors->first('nome') }}@endif

<input type="text" name="descricao" placeholder="Descreva o produto" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta">
@if($errors->has('descricao')){{ $errors->first('descricao') }}@endif

<input type="number" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
@if($errors->has('peso')){{ $errors->first('peso') }}@endif

<select name="unidade_id">
    <option value="">-- Unidade de Medida --</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }} {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}">{{ $unidade->id}}</option>
    @endforeach
</select>
@if($errors->has('unidade_id')){{ $errors->first('unidade_id') }}@endif
@if(isset($produto->id))
<button type="submit" class="borda-preta" style="background-color: blue;">Editar</button>
@else
<button type="submit" class="borda-preta" style="background-color: green;">Adicionar</button>
@endif
</form>
