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
            $table->decimal('total')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('desconto')->nullable();
            $table->timestamps();
        });

        // DB::table('pedidos')->insert([
        //     ['data' =>date('y-m-d h:m:s'), 'status' => 'pendente', 'total' => 0, 'subtotal' => 0, 'desconto' => 0, 'created_at' => date('y-m-d h:m:s'), 'updated_at' => date('y-m-d h:m:s')],
        //  ]);
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
