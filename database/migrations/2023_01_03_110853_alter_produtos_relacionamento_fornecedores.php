<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos que vai receber a chave estrangeira de fornecedores
        Schema::table('produtos', function (Blueprint $table) {

           $fornecedor_id =  DB::table('fornecedores')->insert([
                'nome' => 'Fornecedor Padrão',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => 'fornecedorpadrao@fonfon.com.br'
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo a coluna fornecedor_id da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
