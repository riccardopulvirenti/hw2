<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrello;
use App\Models\Piatto;

class CarrelloController extends Controller
{
    public function index()
    {
        $idcarrelloutente = Carrello::getItemUtente();
        $carrello = [];
        foreach($idcarrelloutente as $elemento)
        {
            $temp = Piatto::getPiatto($elemento['id_piatto']);
            $temp['id_ristorante'] = $elemento['id_ristorante'];
            array_push($carrello,$temp);
        }
        
        
        return view("carrello", compact("carrello"));
    }
    public function aggiungialcarrello(Request $request)
    {
        if(Carrello::aggiungialcarrello($request->id_piatto,$request->id_ristorante))
        {
            if (str_contains(url()->previous(), '/ristorante/mostra')) {
                return redirect()->to('/ristorante/mostra/' . $request->id_ristorante);
            }
            else{
                return redirect()->to('/carrello');
            }
        }
    }
    public function rimuovidalcarrello(Request $request)
    {
        if(Carrello::rimuovidalcarrello($request->id_piatto,$request->id_ristorante))
        {
            if (str_contains(url()->previous(), '/ristorante/mostra')) {
                return redirect()->to('/ristorante/mostra/' . $request->id_ristorante);
            }
            else{
                return redirect()->to('/carrello');
            }
        }
    }
}
