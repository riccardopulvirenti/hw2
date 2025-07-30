@extends('layouts.app')
@section('title')
    Just Eat | Menu {{ $inforistorante['nome_ristorante'] }}
@endsection
@section('content')
    <div id="informazioni_ristorante">
        <h3>Nome ristorante: {{ $inforistorante['nome_ristorante'] }}</h3>
        <h4>Tipologia ristorante: {{ $inforistorante['tipologia_ristorante'] }}</h4>
        <h4>Provincia ristorante: {{ $inforistorante['provincia_ristorante'] }}</h4>
        <div>
            @for ($i = 0; $i < $inforistorante['stelle_ristorante']; $i++)
                <img src="{{ asset('svg/favourite.svg') }}" alt="stella">
            @endfor
        </div>
    </div>

    <div id="piatti_ristorante">
        @foreach ($piatti as $piatto)
            <div class="pietanza" data-id_piatto="{{ $piatto['id_piatto'] }}">
                <p><strong>{{ $piatto['nome_piatto'] }}</strong></p>
                <p>{{ number_format($piatto['prezzo'], 2, ',', '.') }} €</p>
                
                @if(session()->has('email_utente'))
                    
                        @if (in_array($piatto['id_piatto'], $piattinelcarrello ?? []))
                            <form method="POST" action="{{ route('rimuovidalcarrello') }}">
                            @csrf
                                <input type="hidden" name="id_piatto" value="{{ $piatto['id_piatto'] }}">
                                <input type="hidden" name="id_ristorante" value="{{ $piatto['pivot']['id_ristorante'] }}">
                                <button type="submit">
                                    <img src={{asset('svg/aggiunto-al-carrello.svg') }}>
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('aggiungialcarrello') }}">
                            @csrf
                                <input type="hidden" name="id_piatto" value="{{ $piatto['id_piatto'] }}">
                                <input type="hidden" name="id_ristorante" value="{{ $piatto['pivot']['id_ristorante'] }}">
                                <button type="submit">
                                    <img src={{asset('svg/aggiungi-al-carrello.svg') }}>
                                </button>
                            </form>
                        @endif
                @endif
            </div>
        @endforeach
    </div>


@endsection

@push('styles')
    <link href="{{ asset('css/mostramenuristorante.css') }}" rel="stylesheet">
@endpush

