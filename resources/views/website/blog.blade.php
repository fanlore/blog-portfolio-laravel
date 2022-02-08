@extends('layouts.website')

@section('content')
        <div class="container-fluid">
      <div id="tooltip-sidebar">Кликните, чтобы перейти</div>
      <div class="blog blog-page">
        <div class="blog__cards blog-page__cards">
            @foreach($posts as $post)
                <div class="blog__card" data-aos="zoom-in-up">
                    <div class="blog__content">
                        <div class="blog__info">
                            <ul class="blog__categories">
                                <li class="blog__category">
                                    <a href="{{ route('category',['category' => $post->category->slug]) }}" class="blog__category-link">{{ $post->category->name }}</a>
                                </li>
                            </ul>
                            <div class="blog__date">
                                {{  date('d.m.Y', strtotime($post->published_at)) }}
                            </div>
                        </div>
                        <h2 class="blog__title">{{ $post->title }}</h2>
                        <p class="blog__subtitle">{{ mb_strimwidth(strip_tags($post->description), 0, 300, "...")}}</p>
                        <a href="{{  route('single',['slug' => $post->slug])  }}" class="blog__link link">Read more</a>
                    </div>
                    <div class="blog__image-container"><img src="{{ $post->image }}" alt="Изображение карточки" class="blog__image"></div>
                </div>
            @endforeach
            @if($posts->hasPages())
              <div class="blog-page__pagination">
                <a href="{{ $posts->previousPageUrl() }}" class="blog__category-link blog-page__prev {{ ($posts->currentPage() === 1) ? 'blog__category-link--disabled' : ''}}">Предыдущая страница</a>
                  @foreach($posts->links()->elements['0'] as $elem => $value)
                    <a href="{{ $value }}" class="blog__category-link blog-page__num {{ ($posts->currentPage() === $elem) ? 'blog__category-link--selected' : '' }}">{{ $elem }}</a>
                  @endforeach
                <a href="{{ $posts->nextPageUrl() }}" class="blog__category-link blog-page__next {{ ($posts->currentPage() === $posts->lastPage()) ? 'blog__category-link--disabled' : ''}}">Следующая страница</a>
              </div>
            @endif
        </div>
          @include('includes.website.blog-sidebar')
      </div>

    </div>
@endsection
