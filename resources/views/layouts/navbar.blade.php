<div id="contenitorelogo">
    <a id="a_logo" href="{{ url('/') }}">
        <img src="{{ asset('svg/logo.svg') }}" alt="Logo">
    </a>
</div>

<div class="rightnav">
    <a id="bottonecercacibo" href="{{ url('cercacibo') }}">
        <img src="{{ asset('svg/food.svg') }}" alt="Cibo">
        <span>Cibo</span>
    </a>

    

    <a href="{{ url('ristoranti') }}">
        <img src="{{ asset('svg/partner.svg') }}" alt="Ristoranti">
        <span>Ristoranti</span>
    </a>

    @if (session()->has('email_utente'))
        <a href="{{ url('informazioni_utente') }}">
            <img src="{{ asset('svg/informazioni.svg') }}" alt="Informazioni utente">
            <span>Info Utente</span>
        </a>

        <a href="{{ url('piattipreferiti') }}">
            <img src="{{ asset('svg/favourite.svg') }}" alt="Piatti preferiti">
            <span>Piatti preferiti</span>
        </a>
        <a href="{{ url('logout') }}">
            <img src="{{ asset('svg/logout.svg') }}" alt="Logout">
            <span>Logout</span>
        </a>

        <a href="{{ url('carrello') }}">
            <img src="{{ asset('svg/carrello.svg') }}" alt="Carrello">
            <span>Carrello</span>
        </a>
    @else
        <a id="login-page-button" href="{{ url('login') }}">
            <img src="{{ asset('svg/person.svg') }}" alt="Login">
            <span>Accedi</span>
        </a>

        <a id="signup-page-button" href="{{ url('signup') }}">
            <img src="{{ asset('svg/signup.svg') }}" alt="Registrati">
            <span>Registrati</span>
        </a>
    @endif

    

    <a>
        <img src="{{ asset('svg/italy.svg') }}" alt="Lingua">
    </a>

    <a id="idmenubutton">
        <img src="{{ asset('svg/menu.svg') }}" alt="Menu">
    </a>
    
</div>


