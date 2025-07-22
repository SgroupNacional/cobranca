<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'conta_whatsapp_id',
        'nome',
        'tipo',
        'namespace',
        'template_name',
        'componentes',
        'mensagem_livre',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'componentes' => 'array',
    ];

    /**
     * Get the WhatsApp account that owns the template.
     */
    public function contaWhatsapp()
    {
        return $this->belongsTo(ContaWhatsapp::class, 'conta_whatsapp_id');
    }
}
