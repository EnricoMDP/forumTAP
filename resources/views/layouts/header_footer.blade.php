
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fórum - Laravel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/novoMain.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
</head>
<body>
    <header class="headerIndex">
        <div class="logoContainer">
            <div style="display: flex; align-items:center;">
                <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                <p>Prody</p>
            </div>
        </div>
        <div class="menu">
            <div>
                <img src="{{ asset('images/botao-home.png') }}" alt="">
                <a href="{{ route('Home') }}">Home</a>
            </div>

            <div>
                <i class="fas fa-comments"></i>
                <a href="{{ route('ListAllTopics') }}">Posts</a>
            </div>

            <div>
                <img src="{{ asset('images/linhas-de-opcoes.png') }}" alt="">
                <a href="{{ route('ListAllCategories') }}">Categorias</a>    
            </div>

            <div>
                <img src="{{ asset('images/tag.png') }}" alt="">
                <a href="{{ route('ListAllTags') }}">Tags</a>        
            </div>

            <div>
                <img src="{{ asset('images/usuario.png') }}" alt="">
                <a href="{{ route('ListAllUsers') }}">Usuários</a>
            </div>

            @auth
                <div>
                    <img src="{{ asset('images/botao-de-login.png') }}" alt="">
                    <a href="{{route('Logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{route('Logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <div>
                    <img src="{{ asset('images/botao-de-login.png') }}" alt="">
                    <a href="{{ route('Login') }}">Login</a>
                </div>
                <div>
                    <img src="{{ asset('images/botao-de-login.png') }}" alt="">
                    <a href="{{ route('Register') }}">Registrar-se</a>
                </div>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- <footer class="footer">
        <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
            <li class="social-icon__item">
                <a class="social-icon__link" href="#">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </li>
            <li class="social-icon__item">
                <a class="social-icon__link" href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
            </li>
            <li class="social-icon__item">
                <a class="social-icon__link" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>
            <li class="social-icon__item">
                <a class="social-icon__link" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
        </ul>
        <p>&copy;2024 Enrico, Márcio</p>
    </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
