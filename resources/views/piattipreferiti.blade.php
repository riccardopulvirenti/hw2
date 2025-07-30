@extends('layouts.app')
@section('title','Just Eat | Piatti Preferiti')
@section('content')
    <div id="piatti_preferiti">
        @if(isset($cibi) && count($cibi) > 0)
            @foreach($cibi as $cibo)
                <div>
                    <img src="{{ $cibo['image_url'] }}" data-idMeal="{{ $cibo['idMeal'] }}">
                    <span>{{ $cibo['nome_piatto'] }}</span>
                    <img src="{{ asset('svg/close.svg') }}" onclick="rimuovipreferito(event)" class="stellapreferiti">
                </div>
            @endforeach
        @else
            <p>Non ci sono piatti preferiti</p>
        @endif
    </div>
          
@endsection
@push('scripts')
    <script defer src="{{ asset('js/piattipreferiti.js') }}"></script>
@endpush

@push('styles')
    <link href="{{ asset('css/piattipreferiti.css') }}" rel="stylesheet">
@endpush

