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

  
.image-decretion {
        text-align: right; /* 画像を右揃えにするために親要素を右寄せに */
    }
    
.slide-image-decretion {
        margin-left: 30px; /* 画像を右に移動 */
    }

.slide-image-decretion1 {
    margin-right: 120px;
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
        
     
        <div class= "slider" style="margin-top: 50px; text-align:center;">
         <div>                                        
            <img src="{{ asset('images/1.png') }}"style="width: 600px;" onclick="nextSlide()">
         </div>

         <div>
            <img src="{{ asset('images/2.png') }}"style="width: 600px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/3.png') }}"style="width: 600px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/4.png') }}"style="width: 600px;" onclick="nextSlide()">
        </div>

        <div>
           <img src="{{ asset('images/5.png') }}"style="width: 600px;" onclick="nextSlide()">
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
  $('.slider').Slick('SlickNext')
}
 $('.slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  centerMode: true,
  centerPadding: '400px'
});
  </script>

@endsection

