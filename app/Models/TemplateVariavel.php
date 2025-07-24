<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateVariavel extends Model
{
    use HasFactory;

    protected $table = 'template_variaveis';

    protected $fillable = [
        'template_id',
        'posicao',
        'nome_exibicao',
        'campo_origem',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}