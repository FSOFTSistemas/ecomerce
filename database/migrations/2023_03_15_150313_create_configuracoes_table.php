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
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nome_fantazia');
            $table->string('cnpj_cpf');
            $table->string('ie')->nullable();
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cidade')->nullable();
            $table->string('chave_pix')->nullable();
            $table->string('pix_titular')->nullable();
            $table->string('tx_id')->nullable();
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
        Schema::dropIfExists('configuracoes');
    }
};
