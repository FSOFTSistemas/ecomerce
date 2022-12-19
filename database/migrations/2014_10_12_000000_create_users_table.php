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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',["cliente","admin"])->nullable();
            $table->string('nome')->nullable();
            $table->string('telefone')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->foreignId('endereco_id')->constrained('enderecos')->nullable();
            $table->foreignId('pedido_id')->constrained('pedidos')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('senha');
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
        Schema::dropIfExists('users');
    }
};
