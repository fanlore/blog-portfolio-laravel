<div class="blog-page__sidebar blog-sidebar">
    {{-- <div class="blog-sidebar__popular">
        <h3 class="blog-sidebar__heading">Популярные</h3>
        <div class="blog-sidebar__item">
            <div class="blog-sidebar__inner">
                <div class="blog-sidebar__image--container">
                    <img src="{{ asset('website') }}/img/blog-image.jpg" alt="изоражение" class="blog-sidebar__image">
                </div>
                <div class="blog-sidebar__content">
                    <div class="blog__info">
                        <a href="#" class="blog-sidebar__link">Web Design</a>
                        <div class="blog__date">
                            12 дек 2021
                        </div>
                    </div>
                    <h3 class="blog-sidebar__title">Пост один</h3>
                    <p class="blog-sidebar__text"><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quae impedit, voluptate ullam ut est fugiat numquam saepe, quo optio magni reprehenderit odio
                            ipsum quod, iste a deserunt sed harum adipisci.</a></p>
                </div>
            </div>
        </div>
        <div class="blog-sidebar__item">
            <div class="blog-sidebar__inner">
                <div class="blog-sidebar__image--container">
                    <img src="{{ asset('website') }}/img/blog-image.jpg" alt="изоражение" class="blog-sidebar__image">
                </div>
                <div class="blog-sidebar__content">
                    <div class="blog__info">
                        <a href="#" class="blog-sidebar__link">Web Design</a>
                        <div class="blog__date">
                            12 дек 2021
                        </div>
                    </div>
                    <h3 class="blog-sidebar__title">Пост один</h3>
                    <p class="blog-sidebar__text"><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quae impedit, voluptate ullam ut est fugiat numquam saepe, quo optio magni reprehenderit odio
                            ipsum quod, iste a deserunt sed harum adipisci.</a></p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="blog-sidebar__popular">
        <h3 class="blog-sidebar__heading">Новые</h3>
        @foreach($recentPosts as $post)
            <div class="blog-sidebar__item">
                <div class="blog-sidebar__inner">
                    <div class="blog-sidebar__image--container">
                        <a href="{{  route('single',['slug' => $post->slug])  }}"><img src="{{ $post->image }}" alt="изоражение" class="blog-sidebar__image"></a>
                    </div>
                    <div class="blog-sidebar__content">
                        <div class="blog__info">
                            <a href="{{  route('category',['category' => $post->category->slug])  }}" class="blog-sidebar__link">{{ $post->category->name }}</a>
                            <div class="blog__date">
                                {{  date('d.m.Y', strtotime($post->published_at)) }}
                            </div>
                        </div>
                        <h3 class="blog-sidebar__title">{{ $post->name   }}</h3>
                        <p class="blog-sidebar__text"><a href="{{  route('single',['slug' => $post->slug])  }}">{{ mb_strimwidth(strip_tags($post->description), 0, 200, "...")}}</a></p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="blog-sidebar__popular">
        <h3 class="blog-sidebar__heading">Категории</h3>
        <ul class="blog-sidebar__categories">
            @foreach($categories as $category)
                <li class="blog-sidebar__category"><a href="{{ route('category',['category' => $category->slug]) }}">{{ $category->name }}</a> <span style="font-weight:100;">({{ $category->posts->count() }})</span></li>
            @endforeach

        </ul>
    </div>
</div>
