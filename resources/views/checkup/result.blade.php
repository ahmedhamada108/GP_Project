@extends('layouts.app')
@section('content')
{{-- result --}}

<div class="results">
    <div class="main-heading">
        <h2>Illness name</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sint ut numquam aperiam placeat maxime illum
            quaerat magni
            facere! Id quisquam consequatur, adipisci in nulla at ducimus natus deleniti saepe.
        </p>
    </div>
    <div class="main-heading">
        <h2>Doctors Suggestion</h2>
    </div>
    <div class="container">
        <div class="box">
            <img src="{{ asset('imgs/card.jpg') }}" alt="ill1">
            <div class="content">
                <h3>Doctor Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo temporibus sed saepe, impedit est soluta id
                </p>
            </div>
            <div class="info">
                <a href="#">Book Now</a>
            </div>
        </div>
        <div class="box">
            <img src="{{ asset('imgs/card.jpg') }}" alt="ill1">
            <div class="content">
                <h3>Doctor Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo temporibus sed saepe, impedit est soluta
                    id 
                </p>
            </div>
            <div class="info">
                <a href="#">Book Now</a>
            </div>
        </div>
        <div class="box">
            <img src="{{ asset('imgs/card.jpg') }}" alt="ill1">
            <div class="content">
                <h3>Doctor Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo temporibus sed saepe, impedit est soluta
                    id 
                </p>
            </div>
            <div class="info">
                <a href="#">Book Now</a>
            </div>
        </div>
        <div class="box">
            <img src="{{ asset('imgs/card.jpg') }}" alt="ill1">
            <div class="content">
                <h3>Doctor Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo temporibus sed saepe, impedit est soluta
                    id
                </p>
            </div>
            <div class="info">
                <a href="#">Book Now</a>
            </div>
        </div>
    </div>
</div>
{{-- result --}}

@endsection