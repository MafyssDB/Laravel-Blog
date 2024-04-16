@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section__inner container">
            <div class="section__head">
                <div class="section__title">Популярные посты</div>
            </div>
            <div class="popular-post">
                @foreach($likedPosts as $likedPost)
                <div class="popular-post__item">
                    <div class="card">
                        <a href="{{ route('post.show', $likedPost->id) }}">
{{--                            <div class="card__img" style="background-image: url({{ asset('storage/' . $likedPost->image) }})"></div>--}}
                            <div class="card__img" style="background-image: url({{ asset($likedPost->image) }})"></div>
                            <div class="card__overlay">
                                <div class="card__title">{{ $likedPost->title }}</div>
                                <div class="card__date">{{ $likedPost->created_at }}</div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @foreach($posts as $post)
    <section class="section">
        <div class="section__inner container">
            <div class="post">
                <div class="post__top">
                    <div class="post__photo" style="background-image: url({{ asset($post->image) }})"></div>
{{--                    <div class="post__photo" style="background-image: url({{ asset('storage/' . $post->image) }})"></div>--}}
                </div>
                <div class="post__body">
                    <div class="post__title">{{ $post->title }}</div>
                    <div class="post__text">{!! $post->content !!}</div>
                </div>
                <div class="post__bootom">
                    <div class="post__data">{{ $post->created_at }}</div>
                    <div class="post__category">{{ $post->category->title }}</div>
                    <div class="post__like">
                            @auth()
                                <form class="like" action="{{ route('post.like.store', $post->id) }}" method="POST">
                                    <div class="like__number">{{ $post->liked_users_count }}</div>
                                    @csrf
                                <button style="border: none; background: transparent;" type="submit">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <img class="like__image" src="{{asset('assets/img/Like_full.png')}}">
                                    @else
                                        <img class="like__image" src="{{asset('assets/img/Like.png')}}">
                                    @endif
                                </button>
                            </form>
                            @endauth
                            @guest()
                                <div class="like">
                                    <div class="like__number">{{ $post->liked_users_count }}</div>
                                    <img class="like__image" src="{{asset('assets/img/Like.png')}}">
                                </div>
                            @endguest

                    </div>
                    <div class="post__link">
                        <a href="{{ route('post.show', $post->id) }}">читать</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endsection
