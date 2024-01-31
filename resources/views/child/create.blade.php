@extends('layouts.app')

@section('content')

<div class="child-container">
    <a href="{{url('child') }}">戻る</a>
    <h2 class="text-center">児童情報登録フォーム</h2>

    @if (session('message'))
        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('child.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="image" class="image-label">
                 <p class="text-container">画像アップロード</p>
                <img id="label-image-preview" class="label-image-preview">
            </label>
            <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(this)" >

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        
        <p class="text-container" id="additional-text">画像アップロード</p>


        <div class="form-group">
            <label for="name" class="font-weight-bold">名前</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="birthdate" class="font-weight-bold">生年月日</label>
            <input type="date" name="birthdate" id="birthdate"  class="form-control">
            @error('birthdate')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="address" class="font-weight-bold">住所</label>
            <input type="text" name="address" id="address" class="form-control">
            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone_number" class="font-weight-bold">電話番号</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
            @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="parentname" class="font-weight-bold">保護者名</label>
            <input type="text" name="parentname" id="parentname"  class="form-control">
            @error('parentname')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-primary ">送信</button>
    </form>
</div>
</div>
@endsection
