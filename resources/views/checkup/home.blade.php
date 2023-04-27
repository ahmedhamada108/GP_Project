@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success" style="text-align: center;" role="alert">
    {{ session('success') }}
</div>
@endif
    <!-- landing -->
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <div class="landing">
            <div class="container">
                <div class="text">
                    <h1>Welcome, To <span>Check Up </span> App</h1>
                    <p><span>The real wealth is your health.</span><br>
                        {{ $settings->website_description }}
                        <br>
                        <a href="{{ route('signup') }}">
                            <input class="submit" type="submit" value="Get Started">
                        </a>
                </div>
                <div class="image">
                    <img src="{{ asset('imgs/1676680354450.webp') }}" alt="landing" >
                </div>
            </div>
            
        </div>
    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
        <div class="landing">
            <div class="container" style="text-align: right;">
                <div class="text">
                    <h1 style="margin-right: 101px;"> <span>Check Up </span> اهلا بك في تطبيق</h1>
                    <p><span style="letter-spacing: 1px !important;"> .الثروة الحقيقية هي صحتك </span><br>
                        {{ $settings->website_description }}
                        <br>
                        <a href="{{ route('signup') }}">
                            <input style="letter-spacing: 1px !important;" class="submit" type="submit" value="أبدا الان">
                        </a>
                </div>
                <div class="image">
                    <img src="{{ asset('imgs/1676680354450.webp') }}" alt="landing" >
                </div>
            </div>
            
        </div>
    @endif
    <!-- landing -->

    <!-- disease -->
    <div class="disease" id="disease">
        @if(LaravelLocalization::getCurrentLocale() == 'en')
            <h2 class="main-title">Diseases</h2>
        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
            <h2 class="main-title">الامراض</h2>
        @endif
        <div class="container">
        @foreach($diseases as $disease)
            <div class="box">
                <img src="{{ $disease->image }}" alt="ill1">
                <div class="content">
                    <h3>{{ $disease->disease_name }}</h3>
                    <p>
                        {{ $disease->diseases_description }}
                    </p>
                </div>
                @if(LaravelLocalization::getCurrentLocale() == 'en')
                    <div class="info">
                        <a href="{{ route('single_disease',$disease->disease_name) }}">Read more</a>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </div>                
                @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                    <div class="info">
                        <a href="{{ route('single_disease',$disease->disease_name) }}">اقرأ المزيد</a>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                @endif
                
            </div>
        @endforeach    
        </div>
    </div>
    <!-- disease -->
    
    <!-- about us -->
    <div class="disease aboutus" id="aboutus">
        @if(LaravelLocalization::getCurrentLocale() == 'en')
            <h2 class="main-title">About Us</h2>
        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
            <h2 class="main-title">عننا</h2>
        @endif
        <div class="container">
            <div class="box" style="width: 72pc;">
                <div class="content">
                    @if(LaravelLocalization::getCurrentLocale() == 'en')
                        <h3>Check Up App</h3>
                    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                    <h3>Check Up تطبيق</h3>
                    @endif
                    <p>
                        {{Str::limit($settings->about_us,300)}}
                    </p>
                </div>
                @if(LaravelLocalization::getCurrentLocale() == 'en')
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>                
            @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                <div class="info">
                    <a href="#">اقرأ المزيد</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            @endif
            </div>

        </div>
    </div>
    <!-- about us -->

    <!-- FQA-->
    <div class="fqa" id="FQA">
        @if(LaravelLocalization::getCurrentLocale() == 'en')
            <h2 class="main-title">FQA</h2>
        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
            <h2 class="main-title">الاسئلة الشائعة</h2>
        @endif
        <div class="container" style="text-align: -webkit-center;justify-content: center;min-height: calc(60vh - 72px)!important">
            <div class="toggle">
                @foreach($FQAs as $FQA)
                    <a href="javascript:void(0);" class="togglefaq">
                        <i class="fa-solid fa-plus fa-beat-fade fa-xl" style="color: #2aaae2;"></i> 
                        {{ $FQA->quest }}
                    </a>
                    <div class="faqanswer">
                        <p> {{$FQA->answer}}</p>
                    </div>   
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Contact us -->
    <div class="landing" id="contact">
        @if(LaravelLocalization::getCurrentLocale() == 'en')
            <h2 class="main-title">Contact Us</h2>
            <div class="container">
                <div class="sign-in" style="margin-left: auto;margin: auto;">
                    <div class="content">
                        <h2>Keep In Touch</h2>
                        <form class="form" action="">
                            <input class="input" type="text" placeholder="Your Name">
                            <input class="input" type="email" placeholder="Your Subject">
                            <input class="input" type="email" placeholder="Your Email">
                            <textarea class="input" placeholder="Write Your Message..."></textarea>
                            <input class="submit" type="submit" value="Send Ticket">
                        </form>
                    </div>
            </div>
        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
            <h2 class="main-title">تواصل معنا</h2>
            <div class="container">
                <div class="sign-in" style="margin-left: auto;margin: auto;">
                    <div class="content">
                        <h2>ابقي علي تواصل معنا</h2>
                        <form class="form" action="">
                            <input style="TEXT-ALIGN: end;" class="input" type="text" placeholder="..اسمك">
                            <input style="TEXT-ALIGN: end;" class="input" type="email" placeholder="..موضوعك">
                            <input style="TEXT-ALIGN: end;" class="input" type="email" placeholder="..بريدك الالكتروني">
                            <textarea style="TEXT-ALIGN: end;" class="input" placeholder="...اكتب رسالتك"></textarea>
                            <input class="submit" type="submit" value="ارسل التذكره">
                        </form>
                    </div>
            </div>
        @endif

            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/login.jpg') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- contact us -->

@endsection