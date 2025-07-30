@extends('layouts.app')
@section('title','Just Eat | Informazioni utente')

@section('content')
    <div id="contenuto_info">
        <form method="POST" action="{{ route('aggiornainfoutente') }}">
            @csrf
            <div>
                <label>Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $informazioniutente->nome ?? '') }}">
            </div>
            <div>
                <label>Cognome:</label>
                <input type="text" id="cognome" name="cognome" value="{{ old('cognome', $informazioniutente->cognome ?? '') }}">
            </div>
            <div>
                <label>Sesso:</label>
                <label>
                    <input type="radio" name="sesso" value="M" required id="maschio"
                        {{ (isset($informazioniutente) && $informazioniutente->sesso === 'M') ? 'checked' : '' }}>
                    Maschio
                </label>

                <label>
                    <input type="radio" name="sesso" value="F" required id="femmina"
                        {{ (isset($informazioniutente) && $informazioniutente->sesso === 'F') ? 'checked' : '' }}>
                    Femmina
                </label>
            </div>
            <div>
                <label>Data di Nascita:</label>
                <input type="date" id="data_di_nascita" name="data_di_nascita" value="{{ old('data_di_nascita', $informazioniutente->data_di_nascita ?? '') }}">
            </div>
            <div>
                <label>Numero di Telefono:</label>
                <input type="text" id="numero_di_telefono" name="numero_telefono" value="{{ old('numero_telefono', $informazioniutente->numero_telefono ?? '') }}">
            </div>
            <p id="status"></p>
            <div>
                <button type="submit">Aggiorna</button>
            </div>
            
        </form>
        <div>
            @if (session('success'))
                <p>
                    {{ session('success') }}
                </p>
            @endif
        </div>
        

    </div>
@endsection


@push('styles')
    <link href="{{ asset('css/informazioni_utente.css') }}" rel="stylesheet">
@endpush
