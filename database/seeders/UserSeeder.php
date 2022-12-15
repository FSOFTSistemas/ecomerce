<?php

namespace Database\Seeders;

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
        $dados = [
            'tipo'=>"cliente",
            'telefone'=>"81981479250",
            'nome'=>"Guilherme",
            'cpf'=>"",
            'rg'=>"",
            'email'=>"admin@mail.com",
            'senha'=>bcrypt("12345678"),
        ];
        if(User::where('email','=',$dados['email'])->count()){
            $usuario = User::where('email','=',$dados['email'])->first();
            $usuario->updade($dados);
        }else{
            User::create($dados);
        }
    }
}
