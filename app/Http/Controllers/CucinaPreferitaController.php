<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CucinaPreferita;

class CucinaPreferitaController extends Controller
{
    
    public function like(Request $request)
    {

        if(CucinaPreferita::create([
            'email' => session('email_utente'),
            'id_cucina' => $request->id_cucina,
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

        if(CucinaPreferita::where('email', session('email_utente'))
        ->where('id_cucina', $request->id_cucina)
        ->delete() > 0)
        {
            return response()->json(['success' => true]);
        }
        else 
        {
            return response()->json(['success'=> false]);
        }
        
    }
}
