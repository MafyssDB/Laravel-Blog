@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section__iiner container">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__item">
                        <a  class="menu__link link" href="">Понравившиеся посты</a>
                    </li>
                    <li class="menu__item">
                        <a  class="menu__link link" href="">Комментарии</a>
                    </li>
                </ul>
            </nav>
            <div class="personal">
                <div class="personal__item">
                    <p class="personal__name">{{ $user->name }}</p>
                </div>
                <div class="personal__item">
                    <div class="personal__img" style="background-image: url({{ asset('storage/' . $user->avatar) }})"></div>
                </div>
            </div>
            <form class="form" action="{{route('personal.main.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form__col">
                    <label class="form__label">Выберите аватар пользователя</label>
                    <input name="avatar" type="file" class="form__input">
                </div>
                <button class="form__button">Отправить</button>
            </form>
        </div>
    </section>
@endsection
