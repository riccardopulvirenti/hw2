@extends('layouts.app')
@section('title','Just Eat | Cerca Cibo')
@section('content')
    <section id="cercacibo">
        <div id="formricerca">
            <div>
                <span>Scatena il tuo languorino con le foto dei nostri piatti!</span>
                <form id="formricercapiatto" action="/api/cercacibo" method="POST" name="cercacibo">
                @csrf
                    <input type="text" id="nomepiatto" value="Cerca il tuo piatto preferito!" required name="nomepiatto">
                    <button type="submit">Cerca</button>
                </form>
                
            </div>
            
        </div>
        <div id="fotocibo">
            @if(isset($cibi))
                @foreach($cibi as $cibo)
                    <div>
                        <img src="{{ $cibo['strMealThumb'] }}" data-idMeal={{ $cibo['idMeal'] }}>
                        <span>{{ $cibo['strMeal'] }}</span>
                        @if(session()->has('email_utente'))
                            @if (in_array($cibo['idMeal'], $piattipreferiti ?? []))
                                <img src="{{ asset('svg/favourite.svg') }}" onclick="rimuovipiatto(event)" class="stellapreferiti">
                            @else
                                <img src="{{ asset('svg/unfavourite.svg') }}" onclick="aggiungipiatto(event)" class="stellapreferiti">
                            @endif
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </section>


@endsection
@push('scripts')
    <script defer src="{{ asset('js/cercacibo.js') }}"></script>
@endpush


