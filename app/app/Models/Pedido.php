<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'pedido_produtos')->withPivot('created_at');
    }
}
