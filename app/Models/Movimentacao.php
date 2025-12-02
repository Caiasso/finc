<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class movimentacao extends Model
{

    protected $table = 'movimentacoes';

    protected $fillable = [
        'tipo_movimentacao',
        'valor_movimentacao',
        'categoria_id',
        'descricao'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
