<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(){ // esse método é responsavel por fazer a ligação entre as tabelas
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id'); // o primeiro parametro é o model que vai fazer a ligação, o segundo é o campo da tabela que vai fazer a ligação e o terceiro é o campo da tabela que vai receber a ligação
    }
    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedor_id', 'id');
    }
    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
