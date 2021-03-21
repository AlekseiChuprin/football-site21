<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Football21</title>
    <link rel="stylesheet" href="{{asset('assets/front/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
</head>
<body>
<header class="header">
    <div class="col-width">
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-0 col-2 col-sm-1 d-lg-none d-flex justify-content-center">
                <div class="icon-menu">
                    <img src="{{asset('assets/front/img/menu-ham-icon.png')}}">
                </div>
            </div>
            <div class="col-6 col-sm-5 col-lg-2 logo1">
                <div class="logo row d-flex align-items-center justify-content-center">
                    <a href="{{route('home')}}">Football21</a>
                </div>
            </div>
            <div class="p-0 col-lg-7 d-lg-flex menu">
                <div class="icon-close d-flex d-lg-none justify-content-end">
                    <img src="{{asset('assets/front/img/close-btn.png')}}">
                </div>

                <ul class="p-0 col d-lg-flex justify-content-center align-items-center">
                    @foreach($categories as $category)
                        <li><a href="{{route('show.category', ['slug' => $category->slug])}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>

            </div>
            <div class="p-0 d-none d-sm-flex col-sm-3 col-lg-2 search justify-content-center">
                <form action="{{route('search')}}" method="get">
                    {{csrf_field()}}
                    <div class="search_block d-flex ">
                        <input type="text" name="search" class="search_block_input" placeholder="Поиск.." value="" required>
                        <span class="search_block_span">
                            <button type="submit" id="search-btn" class="search_block_button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- @if(Auth::check())
                <p>Привет {{ Auth::user()->name }} </p>

                    <a class="log_in" href="{{route('logout')}}">
                        <button>Выйти</button>
                    </a>

            @else
                <div id="log_in" class="p-0 d-none col-lg-1 d-lg-flex justify-content-end">
                    <a class="log_in" href="{{route('login.create')}}">
                        <button>Войти</button>
                    </a>
                </div>
            @endif -->
            @if(Auth::check())                
                <div id="log_in" class="dropdown p-0 col-4 col-sm-2 col-lg-1 d-flex justify-content-end">
                    <a class="log_in" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                        <button>{{ Auth::user()->name }}</button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <li><a class="dropdown-item" href="#">Аккаунт</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                    </ul>
                </div>
            @else
                <div id="log_in" class="dropdown p-0 col-4 col-sm-2 col-lg-1 d-flex justify-content-end">
                    <a class="log_in" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <button>NEW USER</button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('login.create')}}">Войти</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Регистрация</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</header>
<section>
    <div class="col-width">
        <div class="col p-0 m-0 row flex-column flex-md-row align-content-between">
            @yield('table-result')
            @yield('content')
        </div>
        <div class="d-flex justify-content-center">
           
        </div>
    </div>
</section>
<footer id="footer">
    <div class="container">
        <div class="row">
            <p class="col text-center">
                Football21, 2021г
            </p>
        </div>
    </div>
</footer>

<script src="{{asset('assets/front/slick/slick.js')}}"></script>
<script type="text/javascript">
    $(".new_slick").slick({
        autoplay: true,
        dots: false,
        /*infinite: true,*/
        arrow: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
</script>
<script src="{{asset('assets/front/js/main.js')}}"></script>
</body>
</html>
