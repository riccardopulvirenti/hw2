<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'province';

    protected $primaryKey = 'id_provincia';

    public $timestamps = false;

    protected $fillable = [
        'nome_provincia',
        'id_regione',
    ];

    public function regione()
    {
        return $this->belongsTo(Regione::class, 'id_regione', 'id_regione');
    }
}
