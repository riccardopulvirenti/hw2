<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recensione extends Model
{
    protected $table = 'recensioni';
    protected $primaryKey = 'numero_recensione';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'voto',
        'titolo_recensione',
        'descrizione',
        'autore',
    ];
}
