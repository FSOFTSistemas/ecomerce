<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco_id',
        'pedido_id',
        'tipo',
        'telefone',
        'nome',
        'cpf',
        'rg',
        'email',
        'senha'
    ];
}
