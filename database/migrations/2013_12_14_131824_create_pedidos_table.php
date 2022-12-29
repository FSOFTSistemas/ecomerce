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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->enum('status',['pendente','aberto','finalizado'])->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('desconto')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
};
