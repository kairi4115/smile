@extends('layouts.app')

@section('content')





<div class="text-center">
    <div class="image-container">
        <div class="image-box">
            <img src="{{ asset('imges/child.png') }}" alt="Child Image">
            <link href="{{asset('css/smilechildren.css') }}" rel="stylesheet">
  
            
            
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
    </div>
</div>
@endsection
