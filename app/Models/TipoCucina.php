<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCucina extends Model
{
    protected $table = 'tipicucina';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nomecucina',
        'path_icona',
    ];
}
