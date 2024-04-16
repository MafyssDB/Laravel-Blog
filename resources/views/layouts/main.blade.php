<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <title>Document</title>
</head>
<body>
<header class="header">
    <div class="header__inner container">
        <div class="header__top">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__item">
                        <a  class="menu__link link" href="{{route('main.index')}}">Главная</a>
                    </li>
                </ul>
            </nav>
            <div class="profile">
                @auth()
                <a href="{{ route('personal.main.index') }}" class="profile__link link">Профиль</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button style="background: transparent; border: none;" type="submit" class="profile__link link">Выйти</button>
                    </form>

                @endauth
                @guest()
                <a href="{{ route('login') }}" class="profile__link link">Войти</a>
                @endguest
            </div>
        </div>
    </div>
</header>
@yield('content')

</body>
</html>
