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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("descricao");
            $table->binary("foto1")->nullable();
            $table->binary("foto2")->nullable();
            $table->binary("foto3")->nullable();
            $table->double("preco_venda");
            $table->double("preco_promocao");
            $table->integer("estoque");
            $table->string("referencia")->nullable();
            $table->string("codigo_de_barras")->nullable();
            $table->string("tamanho");
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->enum("item_ativo",["sim","nao"])->default('sim');
            $table->enum("promocao_ativa",["sim","nao"])->default('nao');
            $table->enum("item_destaque",["sim","nao"])->default('nao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
