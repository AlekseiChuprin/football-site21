@extends('front.layouts.layout')

@section('content')
    <section>
        <div class="d-flex flex-column flex-lg-row align-content-between">
            <div class="onenews_left order-3 order-lg-1 col-12 col-lg-2">
                <p>теги 1</p>
                <p>теги 2</p>
                <p>теги 3</p>
                <p>теги 4</p>
                <p>теги 5</p>
            </div>
            <div class="p-0 order-1 order-lg-2 col-12 col-lg-6">
                <div class="onenews">
                    <div class="onenews_title">
                        {{$post->title}}
                    </div>
                    <span class="entry-date">{{$post->getPostDate()}}</span>
                    <div class="onenews_foto">
                        <img class="" src="{{$post->getImage()}}" alt="">
                        @if($post->tags->count())

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Теги - </span>
                                    @foreach($post->tags as $tag)
                                        <div class="entry-category-icon"><a href="{{route('show.tags', ['slug' => $tag->slug])}}">{{$tag->title}}</a></div>
                {{--<small><a href="{{route('show.tags', ['slug' => $tag->slug])}}" title="">{{$tag->title}}</a></small>--}}

                    @endforeach
                    </div><!-- end meta -->
                    </div><!-- end title -->
                    @endif

                    </div>
                    <div class="onenews_text">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div class="onenews_right order-2 order-lg-3 col-12 col-lg-4">
                <p class="newpost_title">
                    список последних новостей
                </p>
                <div class="newpost_name">
                    @foreach($posts as $post)
                    <p>
                        <a href="{{route('show.post', ['slug' => $post->slug])}}">
                            {{$post->title}}
                        </a>
                    </p>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
