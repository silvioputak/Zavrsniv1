<ul>
    @guest
    <li><a href="{{ route('register') }}">Registracija</a></li>
    <li><a href="{{ route('login') }}">Prijava</a></li>
    @else
    
    <li>
        <a href="/admin">
        {{ ucwords(Auth::user()->name) }}
        </a>
    </li>
    
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Odjava
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
</ul>