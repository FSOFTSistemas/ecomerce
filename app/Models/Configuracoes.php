<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'razao_social',
        'nome_fantazia',
        'cnpj_cpf',
        'ie',
        'telefone',
        'endereco',
        'cidade',
        'chave_pix',
        'pix_titular',
        'tx_id',
    ];
}
