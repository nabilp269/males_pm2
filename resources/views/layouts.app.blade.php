@if(Auth::check())
    <p>Halo, {{ Auth::user()->name }} | <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a>
@endif
