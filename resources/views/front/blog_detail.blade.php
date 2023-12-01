@extends('front.layouts.master')
@section('main-container')
    <div>
        <div  class="container text-center">
            <h4 style="margin-top: 70px; font-size: 50px; font-weight: 600;">Bài Viết</h4>
        </div>
    </div>

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>

                        <div class="blog__sidebar__item">
                            <h4>Tin Liên Quan</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($relatedPosts as $p)
                                <a href="{{route('posts.show', $p->url_seo)}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('storage/img/' . $p->image_post) }}" style="width: 70px;height: 70px;object-fit: cover" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$p->title}}<br /></h6>
                                        <span>{{$p->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8 col-md-7 order-md-1 order-1">

                    <div class="blog__details__text">
                        <img src="" alt="">

                        </p>
                        <h3> {{ $post -> title }} </h3>
                        <p>
                            {!! $post -> content !!}
                        </p>
                    </div>

                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__text">
                                        <h6>By System {{$post->author}} on {{$post->formattedCreatedAt}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

@endsection
