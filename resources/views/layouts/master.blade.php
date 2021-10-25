<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@Yield('title')</title>

    <link href="/css/styles.css" rel="stylesheet">
    <script src="/js/scripts.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="" alt="">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">Eventos</a>
                </li>
                <li class="nav-item">
                    <a href="{{{ route('create') }}}" class="nav-link">Criar Eventos</a>
                </li>
                @auth()
                <li class="nav-item">
                    <a href=" " class="nav-link">Meus Eventos</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                    </form>
                </li>
                @endauth
                @guest()
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Cadastrar</a>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    @yield('content')
<footer>
    <p>Events &copy; 2020</p>
</footer>
</body>
</html>
