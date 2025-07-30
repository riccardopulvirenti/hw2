@extends('layouts.app')
@section('title','Just Eat | Ristoranti')

@section('content')
<div>
    <form method="POST" action="{{ route('cercaristoranti') }}" id="form_filtri">
        @csrf
        <div>
            <label>Seleziona una Regione :</label>
            <select id="scelta_regione" name="regione_id" required onchange="this.form.submit()">
                <option value="" disabled {{ old('regione_id', $selectedRegione ?? '') == '' ? 'selected' : '' }}>Scegli una Regione</option>
                @foreach($regioni as $regione)
                    <option value="{{ $regione->id_regione }}"
                        {{ old('regione_id', $selectedRegione ?? '') == $regione->id_regione ? 'selected' : '' }}>
                        {{ $regione->nome_regione }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label>Seleziona una Provincia:</label>
            <select name="provincia" id="scelta_provincia" required onchange="this.form.submit()">
                <option value="" disabled {{ old('provincia', $selectedProvincia ?? '') == '' ? 'selected' : '' }}>Scegli una Provincia</option>
                @if(!empty($province))
                    @foreach($province as $provincia)
                        <option value="{{ $provincia->nome_provincia }}"
                            {{ old('provincia', $selectedProvincia ?? '') == $provincia->nome_provincia ? 'selected' : '' }}>
                            {{ $provincia->nome_provincia }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <div>
            <label>Seleziona il numero di stelle:</label>
            <select name="stelle" id="scelta_stelle" required onchange="this.form.submit()">
                <option value="" disabled hidden {{ old('stelle', $selectedStelle ?? '') == '' ? 'selected' : '' }}>Seleziona le stelle del ristorante</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('stelle', $selectedStelle ?? '') == $i ? 'selected' : '' }}>
                        {{ $i }} Stelle
                    </option>
                @endfor
            </select>
        </div>
        <div>
            
        </div>

    </form>
    <form method="GET" action="{{ url('ristoranti') }}">
        <button type="submit">Resetta filtri</button>
    </form>
    <div id="divcontenitoreristoranti">
        @foreach ($ristoranti as $ristorante)
            <a href="{{ route('ristorante.mostra', ['id' => $ristorante->id_ristorante]) }}" data-id_ristorante="{{ $ristorante->id_ristorante }}">
                <h3>{{ $ristorante->nome_ristorante }}</h3>
                <p>{{ $ristorante->tipologia_ristorante }}</p>
                <p>{{ $ristorante->provincia_ristorante }}</p>
                <div>
                    @for ($i = 0; $i < $ristorante->stelle_ristorante; $i++)
                        <span>★</span>
                    @endfor
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('css/ristoranti.css') }}" rel="stylesheet">
@endpush

