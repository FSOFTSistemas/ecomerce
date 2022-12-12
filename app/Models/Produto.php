<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'preco_venda',
        'preco_promocao',
        'estoque',
        'referencia',
        'codigo_de_barras',
        'nome',
        'tamanho',
        'foto',
        'promocao_ativa',
        'produto_ativo'
    ];
}
