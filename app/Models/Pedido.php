<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'valor', 'data'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function produtos()
    {
        //Esta função retorna todos os produtos que estão relacionados com o pedido
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id'); //O belongsToMany é usado para relacionar tabelas que possuem uma relação de muitos para muitos
    }
}
