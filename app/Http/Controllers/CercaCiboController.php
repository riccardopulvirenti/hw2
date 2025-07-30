<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\PiattoPreferito;

class CercaCiboController extends Controller
{
    public function cercacibo(Request $request)
    {
        $rispostaapi = Http::withoutVerifying()->get("http://www.themealdb.com/api/json/v1/1/search.php", [
            's' => $request->nomepiatto,
        ]);
        $cibi = $rispostaapi->json()['meals'] ?? [];
        $piattipreferiti = PiattoPreferito::getPiattiPreferitiUtente()->pluck('idMeal')->toArray();
        return view('cercacibo', compact('cibi','piattipreferiti'));
    }

    public function like(Request $request)
    {
        

        if(PiattoPreferito::create([
            'email_utente' => session('email_utente'),
            'idMeal' => $request->idMeal,
            'nome_piatto' => $request->nome_piatto,
            'image_url' => $request->image_url
        ]))
        {
            return response()->json(['success' => true]);
        }
        else 
        {
            return response()->json(['success'=> false]);
        }
        
    }

    public function unlike(Request $request)
    {
        if(PiattoPreferito::where('email_utente', session('email_utente'))
        ->where('idMeal', $request->idMeal)
        ->delete() > 0)
        {
            return response()->json(['success' => true]);
        }
        else 
        {
            return response()->json(['success'=> false]);
        }
        
    }

    public function piattipreferiti()
    {
        $cibi = PiattoPreferito::where('email_utente',session('email_utente'))->get();
        return view('piattipreferiti',compact('cibi'));
    }
}
