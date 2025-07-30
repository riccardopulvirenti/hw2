<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformazioneUtente extends Model
{
    protected $table = 'utenti_info';

    protected $primaryKey = 'email';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'nome',
        'cognome',
        'data_di_nascita',
        'sesso',
        'numero_telefono',
    ];

    public static function getInfoUtente()
    {
        return self::where('email','=',session('email_utente'))->first();
    }

    public static function inizializzaUtente($mail)
    {
        return self::create([
            'email' => $mail,
        ]);
    }


    public static function aggiornaInfoUtente(array $info)
    {
        $record = self::where('email', session('email_utente'))->first();
        return $record->update($info);
    }

}
