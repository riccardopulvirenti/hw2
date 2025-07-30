<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ristorante extends Model
{
    protected $table = 'ristorante';
    protected $primaryKey = 'id_ristorante';
    public $timestamps = false;

    protected $fillable = [
        'nome_ristorante',
        'tipologia_ristorante',
        'provincia_ristorante',
        'stelle_ristorante',
    ];

    public function piatti()
    {
        return $this->belongsToMany(Piatto::class, 'menu_ristorante', 'id_ristorante', 'id_piatto');
    }
}
