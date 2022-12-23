<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endereco = Endereco::create();
        $dados = [
            'tipo'=>"admin",
            'telefone'=>"",
            'nome'=>"Admin",
            'cpf'=>"",
            'rg'=>"",
            'endereco_id'=> $endereco->id,
            'email'=>"admin@mail.com",
            'senha'=>bcrypt("123456789"),
        ];
        if(User::where('email','=',$dados['email'])->count()){
            $usuario = User::where('email','=',$dados['email'])->first();
            $usuario->updade($dados);
        }else{
            User::create($dados);
        }
    }
}
