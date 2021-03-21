@extends('front.layouts.layout')

@section('content')
    <div class="p-0 order-1 order-lg-2 col-12 col-md-8 col-lg-6 new_content">
        @if (count($posts) > 0)
        <div class="new_slick">
            @foreach($mainPosts as $mainPost)
                <div class="allpost">
                    <a class="" href="{{route('show.post', ['slug'=>$mainPost->slug])}}">
                        <div class="post_foto">
                            <img src="{{$mainPost->getImage()}}" alt="">
                        </div>
                        <div class="allpost_title">
                            {{$mainPost->title}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    <!-- @foreach($posts as $post)
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
            </div>
        </div>
        @endforeach -->

    @foreach($posts as $post)
        <div id="allnews">
            <a class="allnews d-flex flex-column flex-sm-row" href="{{route('show.post', ['slug'=> $post->slug])}}">
                <div class="allnews_foto">
                    <img src="{{$post->getImage()}}" alt="">
                </div>
                <div class="d-flex flex-column justify-content-between">
                    <div class="allnews_block d-flex justify-content-between">
                        <div class="allnews_block_img d-flex">
                            <img src="{{asset('assets/front/img/calendar.png')}}" alt="">
                            <div>{{$post->getPostDate()}}</div>
                        </div>
                        <div class="d-flex">
                            <div class="allnews_block_img d-flex">
                                <img src="{{asset('assets/front/img/like.png')}}" alt="">
                                <div>5</div>
                            </div>
                            <div class="allnews_block_show">
                                <div class="allnews_block_img d-flex">
                                    <img src="{{asset('assets/front/img/show.png')}}" alt="">
                                    <div>{{ $post->views }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allnews_title d-flex align-items-end align-content-end flex-grow-1">
                    {{$post->title}}
                </div>
                </div>
                
            </a>
        </div>
        
    @endforeach
    	<div class="allnews_pagination">
            {{$posts->links()}}
        </div>
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
    @else
    <div>Записей пока нет...</div>
    @endif
@endsection

@section('table-result')
    @include('front.table-result')
@endsection

