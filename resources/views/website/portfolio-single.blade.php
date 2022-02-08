@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <h2 class="single__category">{{ $post->category->name }}</h2>
</div>
<div class="container-fluid" style="margin-bottom: 50px;">
      <div class="single">
        <div class="single__post">
          <div class="single__image--container">
            <img src="{{ $post->image}}" alt="изображение поста" class="single__image">
          </div>
          <div class="single__content">
            <div class="single__info">
              <h3 class="single__title">{{ $post->title }}</h3>
              <div class="single__date--container">
                <p class="single__date--mark">Дата</p>
                <p class="single__author"> {{  date('d.m.Y', strtotime($post->published_at)) }}</p>
              </div>
            </div>
            <p class="single__text">
                {!!html_entity_decode($post->description)!!}
            </p>
          </div>
        </div>
        <div class="single__buttons">
          <a class="single__button blog__category-link {{!$prev ? 'blog__category-link--disabled' : ''}}" @if($prev) href="{{ route('portfolio.single',['slug' => $prev])}}"@endif>Предыдущая работа</a>
          <a class="single__button blog__category-link {{!$next ? 'blog__category-link--disabled' : ''}}" @if($next) href="{{ route('portfolio.single',['slug' => $next])}}"@endif>Следующая работа</a>
        </div>
      </div>
</div>
@endsection


