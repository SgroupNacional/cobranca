<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReguaAcao extends Model
{
    use HasFactory;

    protected $table = 'regua_acoes';
    // Campos preenchíveis automaticamente
    protected $fillable = ['regua_cobranca_id', 'descricao', 'icone'];

    // Relação: uma ação pertence a uma posição da régua
    public function posicao()
    {
        return $this->belongsTo(ReguaCobranca::class, 'regua_cobranca_id');
    }
}
