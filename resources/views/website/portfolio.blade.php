@extends('layouts.website')

@section('content')

<div class="container-fluid">
      <div class="portfolio" data-tabs="portfolio">
          <div class="portfolio-choice__container tabs__nav">
            @foreach($categories as $category)
                  <div class="portfolio-choice__item tabs__nav-btn">
                      <input type="radio" id="{{ $category->slug }}" name="portfolio-choice" class="portfolio-choice__radio visually-hidden" checked>
                      <label for="design" class="portfolio-choice__label portfolio-choice--design" data-portfolio-category="{{ $category->name }}">
                          @if($category->slug === 'web-developement')
                              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M39.2027 0.0124306C34.8653 0.879784 30.468 0.879784 26.1313 0.0124306C25.936 -0.0255702 25.732 0.0244309 25.578 0.150434C25.4233 0.277103 25.3333 0.465774 25.3333 0.665779V4.66587H3.33333C1.49533 4.66587 0 6.16124 0 7.99928V27.9997C0 29.8378 1.49533 31.3331 3.33333 31.3331H15.8353L14.798 35.9999H11.3333C10.9647 35.9999 10.6667 36.2979 10.6667 36.6666C10.6667 38.5046 12.162 40 14 40H26C27.838 40 29.3333 38.5046 29.3333 36.6666C29.3333 36.2979 29.0353 35.9999 28.6667 35.9999H25.2013L24.164 31.3331H36.6667C38.5047 31.3331 40 29.8378 40 27.9997V8.23595V0.665779C40 0.465774 39.91 0.277103 39.756 0.150434C39.602 0.0244309 39.3993 -0.0249036 39.2027 0.0124306ZM26.6667 1.46913C30.6527 2.17248 34.6807 2.17248 38.6667 1.46913V8.23595C38.6667 9.53998 38.0293 10.7653 36.9607 11.5127L32.6667 14.5188L28.3727 11.5127C27.304 10.7653 26.6667 9.54065 26.6667 8.23595V5.33255V1.46913ZM26 38.6666H14C13.1307 38.6666 12.3893 38.1093 12.114 37.3333H15.3333H24.6667H27.886C27.6107 38.1093 26.8693 38.6666 26 38.6666ZM23.8353 35.9999H16.1647L17.2013 31.3331H22.7987L23.8353 35.9999ZM36.6667 29.9998H23.3333H16.6667H3.33333C2.23067 29.9998 1.33333 29.1024 1.33333 27.9997V25.9997H7.33333H32.6667H38.6667V27.9997C38.6667 29.1024 37.7693 29.9998 36.6667 29.9998ZM8 12.666V8.66596H17.3333V12.666H8ZM38.6667 11.7634V24.6663H33.3333V16.6661H32V24.6663H8V13.9994H26.6667V12.666H18.6667V8.66596H24V7.3326H7.33333C6.96467 7.3326 6.66667 7.6306 6.66667 7.99928V24.6663H1.33333V7.99928C1.33333 6.89659 2.23067 5.99923 3.33333 5.99923H25.3333V8.23595C25.3333 9.97466 26.1833 11.6087 27.608 12.6054L32.2847 15.8788C32.3993 15.9588 32.5333 15.9995 32.6667 15.9995C32.8 15.9995 32.934 15.9588 33.0487 15.8788L37.7253 12.6054C37.9013 12.482 38.0687 12.3487 38.2267 12.2074C38.292 12.1487 38.3493 12.0827 38.4113 12.0214C38.4973 11.936 38.5867 11.854 38.6667 11.7634Z" fill="black"/>
                                  <path d="M32 9.9992C32.1707 9.9992 32.3413 9.93387 32.4713 9.80386L36.4713 5.80377L35.5287 4.86108L32 8.38983L30.4713 6.86113L29.5287 7.80382L31.5287 9.80386C31.6587 9.93387 31.8293 9.9992 32 9.9992Z" fill="black"/>
                                  <path d="M10.6667 9.99927H9.33334V11.3326H10.6667V9.99927Z" fill="black"/>
                                  <path d="M13.3333 9.99927H12V11.3326H13.3333V9.99927Z" fill="black"/>
                                  <path d="M16 9.99927H14.6667V11.3326H16V9.99927Z" fill="black"/>
                                  <path d="M16 15.9993H10.6667C10.298 15.9993 10 16.2973 10 16.6659V21.9994C10 22.3681 10.298 22.6661 10.6667 22.6661H16C16.3687 22.6661 16.6667 22.3681 16.6667 21.9994V16.6659C16.6667 16.2973 16.3687 15.9993 16 15.9993ZM15.3333 21.3327H11.3333V17.3326H15.3333V21.3327Z" fill="black"/>
                                  <path d="M29.3333 15.9993H20V17.3326H29.3333V15.9993Z" fill="black"/>
                                  <path d="M29.3333 18.666H20V19.9994H29.3333V18.666Z" fill="black"/>
                                  <path d="M26.6667 21.3328H20V22.6661H26.6667V21.3328Z" fill="black"/>
                                  <path d="M29.3333 21.3328H28V22.6661H29.3333V21.3328Z" fill="black"/>
                              </svg>
                          @else
                              <svg width="40" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M26.4251 0.65279C22.4275 4.69499 18.4318 8.73927 14.4356 12.783C14.3628 12.8457 14.3047 12.9241 14.2655 13.0123L12.4319 17.1785C12.1701 17.7732 12.343 18.437 12.7368 18.8352C13.1307 19.2335 13.787 19.4083 14.3751 19.1436L18.4632 17.3021C18.562 17.2635 18.6277 17.215 18.7089 17.13C22.7115 13.0809 26.7154 9.03426 30.7174 4.98706C31.4679 4.22802 31.4679 2.98179 30.7174 2.22279L29.1648 0.652671C28.1901 -0.284331 27.2945 -0.148122 26.4251 0.652671L26.4251 0.65279ZM28.2499 1.5716L29.8025 3.14303C30.0598 3.40334 30.0599 3.8067 29.8025 4.06699L27.2329 6.66563L24.768 4.17281L27.34 1.5716C27.7061 1.28156 27.8921 1.25749 28.2499 1.5716ZM10.965 3.72549C9.9036 3.72549 9.03059 4.60709 9.03059 5.68047V11.5531H1.9344C0.872992 11.5531 7.30709e-06 12.4398 0 13.5132V35.0438C7.30709e-06 36.1172 0.872992 37 1.9344 37H29.035C30.0964 37 30.9694 36.1172 30.9694 35.0438V29.1723H38.0656C39.127 29.1723 40 28.2856 40 27.2123V5.68047C40 4.60709 39.127 3.72549 38.0656 3.72549H32.9026C32.5482 3.72688 32.2612 4.01702 32.2598 4.37541C32.2586 4.73576 32.5462 5.02908 32.9026 5.03049H38.0656C38.4296 5.03049 38.7133 5.31236 38.7133 5.68047V7.63672H29.679C29.3221 7.63746 29.0336 7.93093 29.035 8.29179C29.0363 8.65067 29.3241 8.94109 29.679 8.94178H38.7133V27.2123C38.7133 27.5804 38.4296 27.8673 38.0656 27.8673C29.0294 27.8575 20.0095 27.8673 10.965 27.8673C10.601 27.8673 10.3223 27.5804 10.3223 27.2123V8.94178H16.128C16.4844 8.94321 16.7744 8.65218 16.7758 8.29179C16.7771 7.92942 16.4864 7.63531 16.128 7.63672H10.3223V5.68047C10.3223 5.31236 10.601 5.03049 10.965 5.03049H20.0006C20.357 5.02911 20.6447 4.73576 20.6433 4.37541C20.642 4.01702 20.355 3.72688 20.0006 3.72549H10.965ZM23.8581 5.09802L26.3205 7.58833L18.2288 15.7677L15.7638 13.28L23.8581 5.09802ZM12.2554 5.68047C11.9006 5.68185 11.6134 5.97284 11.6127 6.33172C11.6114 6.69207 11.8991 6.98538 12.2554 6.98679C12.6138 6.98822 12.9046 6.69407 12.9032 6.33172C12.9025 5.97084 12.6123 5.67906 12.2554 5.68047ZM14.8363 5.68047C14.4815 5.68185 14.1943 5.97284 14.1936 6.33172C14.1923 6.69207 14.48 6.98538 14.8363 6.98679C15.1946 6.98822 15.4855 6.69407 15.4841 6.33172C15.4834 5.97084 15.1932 5.67906 14.8363 5.68047ZM17.4172 5.68047C17.0623 5.68185 16.7752 5.97284 16.7745 6.33172C16.7732 6.69207 17.0609 6.98538 17.4172 6.98679C17.7755 6.98822 18.0664 6.69407 18.065 6.33172C18.0643 5.97084 17.7741 5.67906 17.4172 5.68047ZM1.9344 12.8582H9.03059V15.4682H1.28667V13.5132C1.28667 13.1451 1.5704 12.8582 1.9344 12.8582ZM3.22233 13.5107C2.86795 13.512 2.58101 13.8023 2.57962 14.1606C2.57833 14.521 2.86598 14.8143 3.22233 14.8157C3.58065 14.8171 3.87147 14.523 3.87007 14.1606C3.86878 13.8003 3.57868 13.5092 3.22233 13.5107ZM5.80322 13.5107C5.44884 13.512 5.1619 13.8023 5.16051 14.1606C5.15922 14.521 5.44687 14.8143 5.80322 14.8157C6.16154 14.8171 6.45236 14.523 6.45096 14.1606C6.44967 13.8003 6.15956 13.5092 5.80322 13.5107ZM25.8064 13.5126C25.1013 13.5126 24.5159 14.1046 24.5159 14.8176V16.1189C24.5159 16.8319 25.1013 17.4239 25.8064 17.4239V22.6453C25.1013 22.6453 24.5159 23.2374 24.5159 23.9504V25.2554C24.5159 25.9684 25.1013 26.5617 25.8064 26.5617H27.0968C27.8018 26.5617 28.3873 25.9684 28.3873 25.2554H33.5503C33.5503 25.9684 34.137 26.5617 34.842 26.5617H36.1324C36.8375 26.5617 37.4229 25.9684 37.4229 25.2554V23.9504C37.4229 23.2374 36.8375 22.6453 36.1324 22.6453V17.4239C36.8375 17.4239 37.4229 16.8319 37.4229 16.1189V14.8176C37.4229 14.1046 36.8375 13.5126 36.1324 13.5126H34.842C34.137 13.5126 33.5503 14.1046 33.5503 14.8176H28.3873C28.3873 14.1046 27.8019 13.5126 27.0968 13.5126H25.8064ZM15.0606 14.4086L17.1097 16.4795L13.8509 17.949C13.7473 17.9957 13.7023 17.9666 13.6467 17.9108C13.5911 17.8545 13.5628 17.813 13.6089 17.7081L15.0606 14.4086ZM25.8064 14.8176H27.0968V16.1189H25.8064V14.8176ZM34.842 14.8176H36.1324V16.1194H34.842V14.8176ZM28.3873 16.1194H33.5503C33.5503 16.8324 34.137 17.4244 34.842 17.4244V22.6458C34.137 22.6458 33.5503 23.2378 33.5503 23.9508H28.3873C28.3873 23.2378 27.8018 22.6458 27.0968 22.6458V17.4244C27.8019 17.4244 28.3873 16.8324 28.3873 16.1194ZM1.28667 16.7744H9.03059V18.1993C8.82833 18.126 8.6139 18.0795 8.38789 18.0795H4.51529C3.45391 18.0795 2.57711 18.9611 2.57711 20.0345V23.3009C2.57711 24.3743 3.45391 25.256 4.51529 25.256H8.38789C8.6139 25.256 8.82832 25.2095 9.03059 25.1362V27.2123C9.03059 28.2856 9.9036 29.1724 10.965 29.1724H29.679V35.0438C29.679 35.4119 29.399 35.695 29.035 35.695H1.9344C1.5704 35.695 1.28667 35.4119 1.28667 35.0438V16.7744ZM30.9694 17.4244C29.5517 17.4244 28.3872 18.6007 28.3873 20.0345C28.3873 21.4682 29.5517 22.6458 30.9694 22.6458C32.3871 22.6458 33.5503 21.4682 33.5503 20.0345C33.5503 18.6007 32.3872 17.4244 30.9694 17.4244ZM30.9694 18.7295C31.6897 18.7294 32.2599 19.306 32.2598 20.0345C32.2598 20.7629 31.6897 21.3408 30.9694 21.3408C30.2491 21.3408 29.679 20.7629 29.679 20.0345C29.679 19.306 30.2491 18.7294 30.9694 18.7295ZM4.51529 19.3845H8.38789C8.75187 19.3845 9.03059 19.6664 9.03059 20.0345V23.3009C9.03059 23.669 8.75187 23.9508 8.38789 23.9508H4.51529C4.15132 23.9508 3.86755 23.669 3.86755 23.3009V20.0345C3.86755 19.6664 4.15132 19.3845 4.51529 19.3845ZM16.128 20.0345C15.7717 20.0359 15.4839 20.3292 15.4853 20.6895C15.486 21.0484 15.7732 21.3394 16.128 21.3408H21.2911C21.6459 21.3394 21.9331 21.0484 21.9338 20.6895C21.9351 20.3292 21.6474 20.0359 21.2911 20.0345H16.128ZM12.2554 22.6458C11.8991 22.6473 11.6113 22.9405 11.6127 23.3009C11.614 23.6593 11.9011 23.9495 12.2554 23.9508H21.2911C21.6455 23.9495 21.9324 23.6593 21.9338 23.3009C21.9351 22.9405 21.6474 22.6472 21.2911 22.6458H12.2554ZM25.8064 23.9508H27.0968V25.2559H25.8064V23.9508ZM34.842 23.9508H36.1324V25.256H34.842V23.9508ZM12.2554 25.256C11.9006 25.2573 11.6134 25.5483 11.6127 25.9072C11.6114 26.2675 11.8991 26.5609 12.2554 26.5623H21.2911C21.6474 26.5609 21.9352 26.2675 21.9338 25.9072C21.9331 25.5483 21.6459 25.2574 21.2911 25.256H12.2554ZM5.15925 26.5623C3.74152 26.5623 2.57711 27.7386 2.57711 29.1723V31.7837C2.57711 33.2175 3.74152 34.3938 5.15925 34.3938C6.577 34.3938 7.74015 33.2175 7.74015 31.7837V29.1723C7.74015 27.7386 6.577 26.5623 5.15925 26.5623ZM5.15925 27.8673C5.8796 27.8673 6.4497 28.4438 6.4497 29.1723V31.7837C6.4497 32.5122 5.8796 33.0887 5.15925 33.0887C4.43892 33.0887 3.86755 32.5122 3.86755 31.7837V29.1723C3.86755 28.4438 4.43892 27.8673 5.15925 27.8673ZM21.2911 30.4774C20.9342 30.476 20.644 30.7678 20.6433 31.1286C20.642 31.491 20.9328 31.7851 21.2911 31.7837H21.9338C22.2921 31.7851 22.5829 31.491 22.5815 31.1286C22.5809 30.7678 22.2906 30.476 21.9338 30.4774H21.2911ZM25.1637 30.4774C24.8068 30.476 24.5166 30.7678 24.5159 31.1286C24.5146 31.491 24.8054 31.7851 25.1637 31.7837H25.8064C26.1647 31.7851 26.4555 31.491 26.4541 31.1286C26.4535 30.7678 26.1632 30.476 25.8064 30.4774H25.1637ZM9.67833 33.0887C9.32199 33.0873 9.03198 33.3783 9.03059 33.7387C9.0293 34.1011 9.32002 34.3952 9.67833 34.3938H18.7089C19.0672 34.3952 19.3581 34.1011 19.3567 33.7387C19.3554 33.3783 19.0653 33.0873 18.7089 33.0887H9.67833ZM21.2911 33.0887C20.9347 33.0873 20.6447 33.3783 20.6433 33.7387C20.642 34.1011 20.9328 34.3952 21.2911 34.3938H22.5815C22.9379 34.3923 23.2256 34.0991 23.2242 33.7387C23.2229 33.3803 22.9359 33.0901 22.5815 33.0887H21.2911ZM25.1637 33.0887C24.8073 33.0873 24.5173 33.3783 24.5159 33.7387C24.5146 34.1011 24.8054 34.3952 25.1637 34.3938H27.7446C28.1009 34.3923 28.3886 34.0991 28.3873 33.7387C28.386 33.3803 28.0989 33.0901 27.7446 33.0887H25.1637Z" fill="black" fill-opacity="1"/>
                              </svg>
                          @endif
                      </label>
                  </div>

            @endforeach

          </div>
          <div class="tabs__content">
              @foreach($categories as $category)
                  <div class="portfolio-works tabs__panel">
                     @if($category->posts->count() === 0)
                        <h2 style="margin-left:20px;">Работ пока нет.</h2>
                     @else
                         @foreach($category->posts as $post )
                              <a href="{{ route('portfolio.single', [$post->slug]) }}" class="portfolio-works__work" data-portfolio-works-title="{{ $post->title }}" data-aos="zoom-in">
                                  <img src="{{ $post->image }}" alt="изображение работы" class="portfolio-works__img">
                                  <div class="portfolio-works__plus"></div>
                              </a>
                          @endforeach
                     @endif
                  </div>
              @endforeach


          </div>
      </div>
</div>


@endsection
