<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piatto extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_piatto';
    public $timestamps = false;

    protected $fillable = [
        'nome_piatto',
        'prezzo',
    ];

    public function ristoranti()
    {
        return $this->belongsToMany(Ristorante::class, 'menu_ristorante', 'id_piatto', 'id_ristorante');
    }

    public static function getPiatto($id)
    {
        return self::where('id_piatto','=', $id)->first();
    }
}
?>
