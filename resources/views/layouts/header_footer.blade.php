<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
</head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
</script>
    <title> Fórum - Laravel </title>
</head>

<body>
    <section class="p-menu1">
        <nav id="navbar" class="navigation" role="navigation">
            <input id="toggle1" type="checkbox" />
            <label class="hamburger1" for="toggle1">
            <div class="top"></div>
            <div class="meat"></div>
            <div class="bottom"></div>
            </label>
        
            <nav class="menu1">
                @guest
                <li>
                    <a class="link1" href="{{ route('Login') }}">
                    Login
                    </a>
                </li>
                @else
                <li>
                    <form id="logout-form" action="{{ route('Logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="link1" style="background:none; border:none; cursor:pointer;">
                            Logout
                        </button>
                    </form>
                </li>
                @endguest
            </nav>
        </nav>
    </section>
    <!-- <nav class="nav">
        <input type="checkbox" class="nav__cb" id="menu-cb"/>
        <div class="nav__content">
            <ul class="nav__items">
            <li class="nav__item">
                <a class="nav__item-text" href="/home">
                Home
                </a>
            </li>
            @guest
                <li class="nav__item">
                    <a class="nav__item-text" href="{{ route('Login') }}">
                    Login
                    </a>
                </li>
                @else
                <li class="nav__item">
                    <form id="logout-form" action="{{ route('Logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav__item-text" style="background:none; border:none; cursor:pointer;">
                            Logout
                        </button>
                    </form>
                </li>
            @endguest
            <li class="nav__item">
                <span class="nav__item-text">
                About
                </span>
            </li>
            <li class="nav__item">
                <span class="nav__item-text">
                Contact
                </span>
            </li>
            </ul>
        </div>
        <label class="nav__btn" for="menu-cb"></label>
    </nav> -->

    <main>
        @yield('content')
    </main>

    <footer class="footer">
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
        <p>&copy;2024 Enrico</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
