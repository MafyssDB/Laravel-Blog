@extends('layouts.main')
@section('content')
	<section class="section">
		<div class="section__inner container">
			<article class="article">
				<div class="article__head">
					<a class="article__button" href="{{ route('main.index') }}">вернуться назад</a>
					<div class="article__title">{{ $post->title }}</div>
					<div class="article__subtitle">
						<div class="article__date">{{ $post->created_at }}</div>
						<div class="article__category">{{ $post->category->title }}</div>
					</div>
				</div>
				<div class="article__body editor">
{{--                 <div class="article__photo" style="background-image: url({{ asset('storage/' . $post->image) }})"></div>--}}
                 <div class="article__photo" style="background-image: url({{ asset($post->image) }})"></div>
					<p>{!! $post->content !!}</p>
				</div>
				<div class="subsection">
                    @if($relatedPosts->count() > 0)
					<div class="subsection__title">Интересно почитать</div>
					<div class="similar">
                        @foreach($relatedPosts as $relatedPost)
						<div class="similar__item">
							<div class="similar__title"><a href="{{ route('post.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a></div>
							<div class="similar__date">{{ $relatedPost->created_at }}</div>
						</div>
                        @endforeach
					</div>
                    @endif
				</div>
				<div class="subsection">
                    @auth
					<div class="subsection__title">Обсуждение</div>
					<form class="form" action="{{ route('post.comment.store', $post->id) }}" method="POST">
                        @csrf
						<div class="form__col">
							<input name="message" class="form__input" placeholder="Текст комментария">
						</div>
						<button class="form__button">Отправить</button>
					</form>
                    @endauth
				</div>
				<div class="article__comments">
                    @foreach($post->comments as $comment)
					<div class="comments">
						<div class="comments__top">
							<div class="user">
								<div class="user__icon" style="background-image: url({{ asset('storage/' . $comment->user->avatar) }})"></div>
								<div class="user__body">
									<div class="user__name">{{ $comment->user->name }}</div>
									<div class="user__date">1 неделю назад</div>
								</div>
							</div>
						</div>
						<div class="comments__body">
							<div class="comments__text">
								 {{ $comment->message }}
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</article>
		</div>
	</section>
@endsection

