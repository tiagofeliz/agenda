<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'id',
        'nome'
    ];

    protected $table = 'pessoas';

    public function telefone(){
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }

    public static function getByFirstLetter($letter){
        return static::where('nome', 'LIKE', $letter.'%')->get();
    }

    public static function getByName($nome){
        return static::where('nome', 'LIKE', '%'.$nome.'%')->get();
    }
}
