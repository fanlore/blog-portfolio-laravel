@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <h2 class="single__category">{{ $post->category->name }}</h2>
</div>
<div class="container-fluid single-container">
      <div class="single">
        <div class="single__post">
          <div class="single__image--container">
            <img src="{{ $post->image}}" alt="изображение поста" class="single__image">
          </div>
          <div class="single__content">
            <div class="single__info">
              <h3 class="single__title">{{ $post->title }}</h3>
              <div class="single__author--container">
                <p class="single__author--mark">Автор</p>
                <p class="single__author">{{ $post->user->name }}</p>
              </div>
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
          <a class="single__button blog__category-link {{!$prev ? 'blog__category-link--disabled' : ''}}" @if($prev) href="{{ route('single',['slug' => $prev])}}"@endif>Предыдущий пост</a>
          <a class="single__button blog__category-link {{!$next ? 'blog__category-link--disabled' : ''}}" @if($next) href="{{ route('single',['slug' => $next])}}"@endif>Следующий пост</a>
        </div>
      </div>
     @include('includes.website.blog-sidebar')
</div>
<div class="container-fluid">
    <div id="disqus_thread" style="margin-top: 30px;"></div>
</div>
@endsection

@section('script')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://myweb-0bi4nmnj2l.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();

    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection
