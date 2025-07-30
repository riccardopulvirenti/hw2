<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiattoPreferito extends Model
{
    protected $table = 'piatti_preferiti';

    protected $primaryKey = ['email_utente', 'idMeal'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'email_utente',
        'idMeal',
        'nome_piatto',
        'image_url',
    ];

    public static function getPiattiPreferitiUtente()
    {
        return self::where('email_utente', session('email_utente'))->get();
    }
}
