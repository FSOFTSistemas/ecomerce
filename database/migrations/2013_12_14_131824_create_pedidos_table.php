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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->enum('status',['pendente','aberto','finalizado'])->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('desconto')->nullable();
            $table->timestamps();
        });

                                                                            // APAGAR INSERT
        DB::table('pedidos')->insert([
            ['data' =>date('y-m-d h:m:s'), 'status' => 'pendente', 'total' => 200, 'subtotal' => 233, 'desconto' => 33, 'user_id' => 1, 'created_at' => date('y-m-d h:m:s'), 'updated_at' => date('y-m-d h:m:s')],
            ['data' =>date('y-m-d h:m:s'), 'status' => 'finalizado', 'total' => 550, 'subtotal' => 580, 'desconto' => 30, 'user_id' => 1, 'created_at' => date('y-m-d h:m:s'), 'updated_at' => date('y-m-d h:m:s')],

         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
