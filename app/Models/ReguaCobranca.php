<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReguaCobranca extends Model
{
      use HasFactory;

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = ['dias', 'registro', 'pagamento', 'vencimento'];

    // Uma posição pode ter várias ações associadas (relacionamento 1:N)
    public function acoes()
    {
        return $this->hasMany(ReguaAcao::class);
    }
}
