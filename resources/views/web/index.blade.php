@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

 <style>
  .slick-prev,.slick-next {
    z-index: 1;
  }
  .slick-next {
    right: 15px;
    color:#333;
  }

 .slick-prev {
    left: 15px;
    color:#333;
  }

 .slider img:hover {
    opacity: 0.8;
    transition: opacity 0.5s ease;
  }

 </style>

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
     
        <div class= "slider">
         <div> 
            <img src="{{ asset('images/1.png') }}"style="width: 470px;" onclick="nextSlide()">
         </div>

         <div>
            <img src="{{ asset('images/2.png') }}"style="width: 470px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/3.png') }}"style="width: 470px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/4.png') }}"style="width: 470px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/5.png') }}"style="width: 470px;" onclick="nextSlide()">
        </div>

        <!--<div class="image-point" style="position: relative;">
            <img src="{{ asset('images/6.png') }}" class="image-point-right" onclick="nextSlide()" style="width: 50px; position:absolute; left: 20px; top: 50%;">
            <img src="{{ asset('images/7.png') }}" class="image-point-left" onclick="nextSlide()" style="width: 50px; position:absolute; right: 740px; top: 50%;">
        </div>
           -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> 

  <script> 
  
 function nextSlide() {
    $('.slider').slick('slickNext');
 }

   $('.slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
   });

  </script>

@endsection

