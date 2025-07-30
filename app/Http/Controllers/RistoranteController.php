<?php

namespace App\Http\Controllers;

use App\Models\Ristorante;
use App\Models\Provincia;
use App\Models\Regione;
use App\Models\Carrello;
use Illuminate\Http\Request;

class RistoranteController extends Controller
{
    public function index()
    {
        $ristoranti = Ristorante::all();
        $regioni = Regione::all();
        return view("ristoranti", compact("ristoranti", "regioni"));
    }

    public function cercaristoranti(Request $request)
    {
        $query = Ristorante::query();

        if ($request->filled('regione_id')) {
            $province = Provincia::where('id_regione', $request->regione_id)->pluck('nome_provincia');
            $query->whereIn('provincia_ristorante', $province);
        }

        if ($request->filled('provincia')) {
            $query->where('provincia_ristorante', $request->provincia);
        }

        if ($request->filled('stelle')) {
            $query->where('stelle_ristorante', $request->stelle);
        }

        $ristoranti = $query->get();

        $regioni = Regione::all();

        $province = collect();
        if ($request->filled('regione_id')) {
            $province = Provincia::where('id_regione', $request->regione_id)->get();
        }

        return view('ristoranti', [
            'ristoranti' => $ristoranti,
            'regioni' => $regioni,
            'province' => $province,
            'selectedRegione' => $request->regione_id,
            'selectedProvincia' => $request->provincia,
            'selectedStelle' => $request->stelle,
        ]);
    }

    public function mostra($id)
    {
        $ristorante = Ristorante::find($id);
        $piatti = $ristorante->piatti->toArray();
        $inforistorante = $ristorante->toArray();

        $piattinelcarrello = Carrello::where('email', session('email_utente'))->where('id_ristorante', $id)->pluck('id_piatto')->toArray();
        
        return view('mostramenuristorante', compact('piatti', 'piattinelcarrello', 'inforistorante'));
    }



}
