<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'id',
        'numero',
        'ddd',
        'pessoa_id'
    ];

    protected $table = 'telefones';
}
