@extends('front.layouts.layout')

@section('content')
    <div class="order-1 order-lg-2 col-12 col-md-8 col-lg-6 new_content">

        @foreach($posts as $post)
            <div class="allpost">
                <a class="" href="{{route('show.post', ['slug'=> $post->slug])}}">
                    <div class="post_foto">
                        <img src="{{$post->getImage()}}" alt="">
                    </div>
                    <div class="allpost_title">
                        {{$post->title}}
                    </div>

                </a>
                <div class="blog-meta big-meta text-center">

                    <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                </div><!-- end meta -->
            </div>
        @endforeach
    </div>
    <div class="order-2 order-lg-3 col-12 col-md-4 col-lg-3 newpost">
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

@endsection

@section('table-result')
    @include('front.table-result')
@endsection

