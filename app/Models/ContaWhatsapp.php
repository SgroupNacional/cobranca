<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaWhatsapp extends Model
{
    protected $table = 'contas_whatsapp';

    protected $fillable = [
        'nome',
        'tipo_api',
        'numero',
        'business_account_id',
        'phone_number_id',
        'token',
        'instance_id',
        'apikey',
    ];
}
