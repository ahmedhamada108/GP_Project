@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success" style="text-align: center;" role="alert">
    {{ session('success') }}
</div>
@endif
    <!-- landing -->
    <div class="landing">
        <div class="container">
            <div class="text">
                <h1>Welcome, To <span>Check Up </span> App</h1>
                <p><span>The real wealth is your health.</span><br />
                    Our mobile app uses advanced machine learning to diagnose diseases from uploaded images of symptoms, suggests healthcare providers in the user's area, and is committed to privacy, security, and providing the best user experience.                            
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
    <!-- landing -->

    <!-- disease -->
    <div class="disease" id="disease">
        <h2 class="main-title">Diseases</h2>
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
                <div class="info">
                    <a href="{{ route('single_disease',$disease->disease_name) }}">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
        @endforeach    
        </div>
    </div>
    <!-- disease -->
    
    <!-- about us -->
    <div class="disease aboutus" id="aboutus">
        <h2 class="main-title">About Us</h2>
        <div class="container">
            <div class="box" style="width:max-content;padding-left: 100px;">
                <div class="content">
                    <h3>Check Up App</h3>
                    <p>
                        The mobile app is designed to help users identify and understand diseases by uploading images of their symptoms.
                        <br>
                        The app uses advanced machine learning models to analyze the images and provide a likely diagnosis. 
                        <br>
                        Additionally, the app suggests doctors and healthcare providers in the user's area who specialize in treating the diagnosed condition. 
                        <br>
                        The app is committed to privacy and security and is constantly improving to provide the best possible user experience.
                    </p>
                </div>
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>

        </div>
    </div>
    <!-- about us -->
    <!-- FQA-->
    <div class="fqa" id="FQA">
        <h2 class="main-title">FQA</h2>
        <div class="container" style="text-align: -webkit-center;justify-content: center;min-height: calc(60vh - 72px)!important">
            <div class="toggle">
                <a href="#" class="togglefaq">
                <i class="fa-solid fa-plus fa-beat-fade fa-xl" style="color: #2aaae2;"></i> How do you tell an introverted computer scientist from an extroverted computer scientist?
                </a>
                <div class="faqanswer">
                    <p>An extroverted computer scientist looks at <em>your</em> shoes when he talks to you.</p>
                </div>
                <a href="#" class="togglefaq">
                    <i class="fa-solid fa-plus fa-beat-fade fa-xl" style="color: #2aaae2;"></i> How do you tell an introverted computer scientist from an extroverted computer scientist?
                </a>
                <div class="faqanswer">
                    <p>An extroverted computer scientist looks at <em>your</em> shoes when he talks to you.</p>
                </div>
                <a href="#" class="togglefaq">
                    <i class="fa-solid fa-plus fa-beat-fade fa-xl" style="color: #2aaae2;"></i> How do you tell an introverted computer scientist from an extroverted computer scientist?
                </a>
                <div class="faqanswer">
                    <p>An extroverted computer scientist looks at <em>your</em> shoes when he talks to you.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contact us -->
    <div class="landing" id="contact">
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
            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/login.jpg') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- contact us -->

@endsection