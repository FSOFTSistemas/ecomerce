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
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->integer('quatidade');
            $table->decimal('total');
            $table->decimal('subtotal');
            $table->decimal('desconto');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER incrementar_estoque BEFORE DELETE ON `item_pedidos` FOR EACH ROW
            BEGIN
                UPDATE produtos
                SET estoque = estoque + (SELECT quatidade FROM `item_pedidos`
                WHERE item_pedidos.produto_id = produtos.id);
            END
        ');

        DB::unprepared('
        CREATE TRIGGER decrementar_estoque BEFORE INSERT ON `item_pedidos` FOR EACH ROW
            BEGIN
                UPDATE produtos
                SET estoque = estoque - (CASE WHEN estoque > 0 AND estoque >= new.quatidade THEN new.quatidade
                WHEN estoque <= 0 THEN 0
                ELSE 0 END)
                WHERE (produtos.id = new.produto_id);
            END
        ');

        DB::unprepared('
        CREATE TRIGGER incrementar_estoque2 BEFORE DELETE ON `item_pedidos` FOR EACH ROW
            BEGIN
                UPDATE produtos
                SET estoque = estoque + 1;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pedidos');
        DB::unprepared('DROP TRIGGER `incrementar_estoque`');
        DB::unprepared('DROP TRIGGER `decrementar_estoque`');
        DB::unprepared('DROP TRIGGER `incrementar_estoque2`');
    }
};
