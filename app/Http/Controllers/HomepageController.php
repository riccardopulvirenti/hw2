<?php

namespace App\Http\Controllers;
use App\Models\Recensione;
use App\Models\TipoCucina;
use App\Models\CucinaPreferita;
use Illuminate\Http\Request;
use App\Http\Controllers\SpotifyController;

class HomepageController extends Controller
{
    public function index()
    {
        $recensioni = Recensione::all();
        $tipicucina = TipoCucina::all();
        $cucinepiaciute = [];
        if (session()->has('email_utente'))
        {
            $cucinepiaciute = CucinaPreferita::getCucinePreferite()->pluck('id_cucina')->toArray();;
        }
        $tracks = SpotifyController::showPlaylist();
        return view("homepage", compact("recensioni","tipicucina","cucinepiaciute","tracks"));
    }
}
