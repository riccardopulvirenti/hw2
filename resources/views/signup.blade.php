@extends('layouts.app')
@section('title','Just Eat | Registrazione')
@section('content')
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div id="contenitoreform">
        <form name='signup' method="POST" action="/signup" id="form-signup">
            @csrf
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}"  id="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type='password' name='password' id="password" required>
            </div>
            <div>
                <label>Conferma Password</label>
                <input type="password" name="password_confirmation" required id="conferma-password">
            </div>
            <div>
                <div>
                    <input type="submit" value="Registrati">
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
@endpush
