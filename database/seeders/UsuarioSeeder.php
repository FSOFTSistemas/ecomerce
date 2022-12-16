<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido = Pedido::create();
        $endereco = Endereco::create();
        $dados = [
            'tipo'=>"admin",
            'telefone'=>"",
            'nome'=>"Admin",
            'cpf'=>"",
            'rg'=>"",
            'endereco_id'=> $endereco->id,
            'pedido_id'=>$pedido->id,
            'email'=>"admin@mail.com",
            'senha'=>bcrypt("123456789"),
        ];
        if(Usuario::where('email','=',$dados['email'])->count()){
            $usuario = Usuario::where('email','=',$dados['email'])->first();
            $usuario->updade($dados);
        }else{
            Usuario::create($dados);
        }
    }
}
