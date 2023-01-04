<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fornecedores'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'site', 'uf', 'email']; // Campos que podem ser preenchidos

    public function produtos(){ // esse método é responsavel por fazer a ligação entre as tabelas
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id'); // o primeiro parametro é o model que vai fazer a ligação, o segundo é o campo da tabela que vai fazer a ligação e o terceiro é o campo da tabela que vai receber a ligação
    }
}
