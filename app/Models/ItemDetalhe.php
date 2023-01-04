<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $table = 'produto_detalhes';
    protected $fillable = ['comprimento', 'largura', 'altura', 'unidade_id', 'produto_id'];

    public function produto(){
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id');
    }
}
