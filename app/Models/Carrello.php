<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrello extends Model
{
    protected $table = 'carrello';
    public $incrementing = false;
    protected $primaryKey = ['email', 'id_piatto'];
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'email',
        'id_piatto',
        'id_ristorante',
    ];

    public static function getItemUtente()
    {
        return self::where('email', session('email_utente'))->get();
    }

    public static function aggiungialcarrello($id_piatto, $id_ristorante)
    {
        return self::create([
            'email' => session('email_utente'),
            'id_piatto' => $id_piatto,
            'id_ristorante' => $id_ristorante,
        ]);
    }
    public static function rimuovidalcarrello($id_piatto, $id_ristorante)
    {
        return self::where('email', session('email_utente'))
            ->where('id_piatto', $id_piatto)
            ->where('id_ristorante', $id_ristorante)
            ->delete();
    }




}
