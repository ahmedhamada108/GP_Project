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
            <div class="box">
                <img src="{{ asset('imgs/ill1.jpeg') }}" alt="ill1">
                <div class="content">
                    <h3>Alzheimer Disease</h3>
                    <p>It is a progressive neurological disorder that causes the brain to shrink and die,
                        and it is a condition that includes a persistent decrease in the ability to think
                        and in behavioral and social skills.
                    </p>
                </div>
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('imgs/ill2.jpeg') }}" alt="ill2">
                <div class="content">
                    <h3>Corneal Disease</h3>
                    <p>It is the condition of the cornea protruding forward in a conical shape when it
                        becomes weak and thinner and cannot maintain its natural shape, which affects
                        vision and causes myopia.
                    </p>
                </div>
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('imgs/ill3.jpeg') }}" alt="ill3">
                <div class="content">
                    <h3>Skin Cancer Disease</h3>
                    <p>It is an abnormal proliferation of skin cells that in most cases arises and 
                        develops on the face of the skin that is exposed to a lot of sunlight, however
                        this type can develop on the skin are not exposed to the sun a lot.
                    </p>
                </div>
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('imgs/ill3.jpeg') }}" alt="ill3">
                <div class="content">
                    <h3>Skin Cancer Disease</h3>
                    <p>It is an abnormal proliferation of skin cells that in most cases arises and 
                        develops on the face of the skin that is exposed to a lot of sunlight, however
                        this type can develop on the skin are not exposed to the sun a lot.
                    </p>
                </div>
                <div class="info">
                    <a href="#">Read more</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
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