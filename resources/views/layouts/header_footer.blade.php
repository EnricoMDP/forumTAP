<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
</head>
<body>
    <header>
        <div class="logoContainer">
            <div style="display: flex; align-items:center;">
                <img src="{{ asset('images/icons8-impacto-genshin-50.png') }}" alt="" class="logo">
                <p>Prody</p>
            </div>
        </div>
        <input type="text" name="" id="searchBar">
        <div class="user-container">
            <div class="topics">
                <a href="{{ route('CreateTopic') }}">
                    <button data-bs-toggle="modal"><i class="fa-solid fa-plus"></i>Start a New Topic</button>
                </a>
            </div>
            <ion-icon name="person-outline"></ion-icon>
            <div>
                @if ($user != null)
                    <span>{{ $user->name }}</span>
                    <span>{{ $user->email }}</span>
                @else
                    <span>Você não está logado</span>
                @endif
            </div>
        </div>

    </header>

    <div class="navbarMain">
        <div class="menuHeader">
            <!-- 1 -->
            <div>
                <ion-icon name="home-outline"></ion-icon>
                <a href="{{ route('Home') }}">Home</a>
            </div>
            <!-- 2 -->
            <div>
                <ion-icon name="apps-outline"></ion-icon>
                <a href="{{ route('ListAllCategories') }}">Categorias</a>    
            </div>
            <!-- 3  -->
            <div>
                <ion-icon name="pricetags-outline"></ion-icon>
                <a href="{{ route('ListAllTags') }}">Tags</a>        
            </div>
            <!-- 4 -->
            <div>
                <ion-icon name="people-outline"></ion-icon>
                <a href="{{ route('ListAllUsers') }}">Usuários</a>
            </div>
            <!-- 5 -->
            @auth
                <div>
                    <ion-icon name="log-in-outline"></ion-icon>
                    <a href="{{ route('Logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{route('Logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <div>
                    <ion-icon name="log-in-outline"></ion-icon>
                    <a href="{{ route('Login') }}">Login</a>
                </div>
            @endauth
        </div>
    </div>

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
        <p>&copy;2024 Enrico, Márcio</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Seleciona todos os botões de dropdown e menus
            const dropdownBtns = document.querySelectorAll('.dropdown-btn');
            const dropdownMenus = document.querySelectorAll('.dropdown-menu');
            
            // Adiciona evento de clique para cada botão
            dropdownBtns.forEach((btn, index) => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation(); // Evita fechar ao clicar no botão

                    // Fecha outros dropdowns antes de abrir o atual
                    dropdownMenus.forEach((menu, i) => {
                        if (i !== index) {
                            menu.style.display = 'none';
                        }
                    });

                    // Alterna a exibição do menu relacionado ao botão clicado
                    const relatedMenu = dropdownMenus[index];
                    relatedMenu.style.display = relatedMenu.style.display === 'block' ? 'none' : 'block';
                });
            });

            // Fecha todos os dropdowns ao clicar fora
            document.addEventListener('click', () => {
                dropdownMenus.forEach((menu) => {
                    menu.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
