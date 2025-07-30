<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
    protected $table = 'regioni';

    protected $primaryKey = 'id_regione';

    public $timestamps = false;

    protected $fillable = [
        'nome_regione',
    ];
}
