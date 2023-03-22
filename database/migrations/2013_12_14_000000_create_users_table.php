<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('email',250)->unique()->nullable();
            $table->string('senha');
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['tipo' => 'admin', 'nome' => 'admin', 'endereco_id' => 1 ,'email' => 'adm@gmail.com', 'senha' => '$2y$10$jWP5W9GdlhM3dQE9QKt0Hu2ohKuFfgFiBX8WO6hbu5JLzcRuwMT1W', 'created_at' => date('y-m-d h:m:s'), 'updated_at' => date('y-m-d h:m:s')],
        ]);

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
