<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CucinaPreferita extends Model
{
    protected $table = 'cucine_preferite';

    public $incrementing = false;

    protected $primaryKey = null;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['email', 'id_cucina'];
    public static function getCucinePreferite()
    {
        return self::where('email', session('email_utente'))->get();
    }

}
