<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedores_id'
    ];

    public function produtoDetalhe() {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }
}
