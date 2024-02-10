@extends('layouts.app')

@section('content')

<div class="text-center">



    <header>
        <nav>
            <ul>
                <li><a href="#">アプリ概要</a></li>
                <li><a href="#">お知らせページ</a></li>
                <li><a href="{{ url('/parents/login') }}">保護者ページ</a></li>
            </ul>
        </nav>
    </header>

    


    <div class="image-container">

        <div class="image-box">
            <img src="{{ asset('imges/child.png') }}" alt="child Image">
        </div>

        <div class="button-container">
            <a href="{{ route('register') }}" class="btn btn-primary">新規登録</a>
            <a href="{{ route('login') }}" class="btn btn-secondary">ログイン</a>
        </div>
        <div class="app-title">
        <h2>保育士さんの業務効率化を目指して<br>
        　　　　ITの力でお手伝いします！
            </h2>
        </div>
     
        <div class="image-slider">
            <div class="image-slide" style="display: block;">
            <img src="{{ asset('images/1.png') }}" class="slide-image"  onclick="nextSlide()">
        </div>

        <div class="image-slide" style="display: none;">
           <img src="{{ asset('images/2.png') }}" class="slide-image"  onclick="nextSlide()">
        </div>

        <div class="image-slide" style="display: none;">
           <img src="{{ asset('images/3.png') }}" class="slide-image" onclick="nextSlide()">
        </div>

        <div class="image-slide" style="display: none;">
           <img src="{{ asset('images/4.png') }}" class="slide-image" onclick="nextSlide()">
        </div>

        <div class="image-slide" style="display: none;">
           <img src="{{ asset('images/5.png') }}" class="slide-image" onclick="nextSlide()">
        </div>

        <div class="image-point" style="position: relative;">
            <img src="{{ asset('images/6.png') }}" class="image-point-right" onclick="nextSlide()" style="width: 50px; position:absolute; left: 20px; top: 50%;">
            <img src="{{ asset('images/7.png') }}" class="image-point-left" onclick="nextSlide()" style="width: 50px; position:absolute; right: 740px; top: 50%;">
        </div>

        </div>

        <div class="image-decretion">
        <img src="{{ asset('images/image1.png') }}" class="slide-image-decretion"> 
        </div>

        <div class="image-decretion1">
        <img src="{{ asset('images/image2.png') }}" class="slide-image-decretion1"> 
        </div>
        
     
        </div>
        </div>
    </div>
</div>

@endsection

