<?php

namespace App\Http\Controllers;

use App\Models\InformazioneUtente;
use Illuminate\Http\Request;

class InformazioniUtenteController extends Controller
{
    public function index()
    {
        $informazioniutente = InformazioneUtente::getInfoUtente();
        return view("informazioni_utente",compact("informazioniutente"));
    }
    public function aggiornainfo(Request $request)
    {
        InformazioneUtente::aggiornaInfoUtente($request->all());
        return back()->with('success', 'Informazioni aggiornate con successo!');

    }


}
