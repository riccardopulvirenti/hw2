@extends('layouts.app')
@section('title','Just Eat | Login')
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
        <form method="POST" action="/login" name='login' id="form-login">
        @csrf
            <div>
                <label>Email</label>
                <input type='email' name='email' id="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type='password' name='password' id="password" required>
            </div>
            <div>
                <div>
                    <input type="submit" value="Accedi">
                </div>
                
            </div>
        </form>
    </div>


@endsection

@push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush

