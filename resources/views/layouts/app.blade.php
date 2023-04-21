<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Up</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sign-in.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/results.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/acc-info.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/history.css') }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- google font -->
    <!-- Import style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
    {{-- meta tags & fav icon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="Check Up">
    <meta name="application-name" content="Check Up">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- header -->
    <div class="header" id="header">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
            <img class="image" src="{{ asset('imgs/Full_Logo_Light.png') }}" alt="Logo">
            </a>
            <ul class="main-nav">
                <li><a href="{{ url('/') }}" class="{{ request()->segment(1) == '' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/#disease') }}">Diseases</a></li>
                <li><a href="{{ url('/#aboutus') }}">About</a></li> 
                <li><a href="{{ url('/#FQA') }}">FQA</a></li> 
                <li><a href="{{ url('/#contact') }}">Contact</a></li>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        @if($localeCode == 'en')
                            @if(LaravelLocalization::getCurrentLocale() == 'en')
                               
                            @else
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img style="width: 30px;" src="{{asset('imgs/icons8-geography.gif')}}" > {{ $properties['native'] }}
                                </a>
                            @endif
                        @elseif($localeCode == 'ar')
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                            @else
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img style="width: 30px;" src="{{asset('imgs/icons8-geography.gif')}}" > {{ $properties['native'] }}
                                </a>
                            @endif
                        @endif
                    </li>
                @endforeach

            @auth('patient')
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                        <img style="width: 30px;" src="{{asset('imgs/icons8-user.gif')}}" > 
                    </a>
                    <ul id="drop" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ route('account_view') }}">
                            <img style="width: 30px;" src="{{asset('imgs/icons8-user-96.png')}}" > 
                            Account
                        </a></li>
                        <li><a href="{{ route('history_view') }}">
                            <img style="width: 30px;" src="{{asset('imgs/icons8-history-96.png')}}" > 
                            History
                        </a></li>
                        <li><a href="{{ route('logout') }}">
                            <img style="width: 25px;" src="{{asset('imgs/icons8-logout-96.png')}}" > 
                            Logout
                        </a></li>
                    </ul>
                </li>
            @endauth
            </ul>
        </div>
    </div>
    <!-- header -->

    @yield('content')

    <!-- footer -->
    <div class="footer" >
        <div class="container">
            <div class="box">
                <img src="{{ asset('imgs/Full_Logo_Light.png') }}" class="image">
                <ul class="social">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
                <p class="text">
                    
                </p>
            </div>
            <div class="box">
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#illnesses">Illnesses</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="box">
                <div class="line">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <div class="info">Egypt, Alexandaria</div>
                </div>
                <div class="line">
                    <i class="fa fa-envelope fa-fw"></i>
                    <div class="info"><a href="mailto:check@up.com">check@up.com</a></div>
                </div>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">
                        <span>+2012345678</span>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright">COPYRIGHT 2022 <span>CheckUp</span>© AllRightS Reserved</p>
    </div>
    <!-- footer -->
    <!-- scroll to up -->
    <span class="up"><i class="fa fa-arrow-up"></i></span>
    <!-- scroll to up -->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/cb2611cb8b.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/history.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
