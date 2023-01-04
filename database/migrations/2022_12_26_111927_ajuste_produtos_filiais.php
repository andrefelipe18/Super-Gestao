<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 100);
            $table->timestamps();
        });
        //Criando a tabela produtos filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
            //constraint
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //Removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Adicionando colunas na tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });
        //Removendo constraint
        Schema::table('produto_filiais', function(Blueprint $table){
            $table->dropForeign('produto_filiais_filial_id_foreign');
            $table->dropForeign('produto_filiais_produto_id_foreign');
        });
        //Removendo tabela
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
