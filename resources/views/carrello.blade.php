@extends('layouts.app')

@section('title', 'Il tuo carrello')

@section('content')
    <div id="contenuto_carrello">
        @php $totale = 0; @endphp

        @foreach($carrello as $elemento)
            <div class="divcontenitore" data-id_piatto="{{ $elemento['id_piatto'] }}" data-id_ristorante="{{ $elemento['id_ristorante'] }}">
                <div class="divtesto">
                    <p>{{ $elemento['nome_piatto'] }}</p>
                    <p>{{ $elemento['nome_ristorante'] }}</p>
                    <p>{{ number_format($elemento['prezzo'], 2, ',', '.') }}€</p>
                </div>

                <div class="divrimuovielemento">
                    <form method="POST" action="{{ route('rimuovidalcarrello') }}">
                        @csrf
                        <input type="hidden" name="id_piatto" value="{{ $elemento['id_piatto'] }}">
                        <input type="hidden" name="id_ristorante" value="{{ $elemento['id_ristorante'] }}">
                        <button type="submit" class="btn-rimuovi">
                            <img src="{{ asset('svg/close.svg') }}" alt="Rimuovi">
                        </button>
                    </form>
                </div>
            </div>

            @php $totale += $elemento['prezzo']; @endphp
        @endforeach

        <hr>

        <div id="testototale">
            <strong>Totale: {{ number_format($totale, 2, ',', '.') }}€</strong>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/carrello.css') }}" rel="stylesheet">
@endpush
