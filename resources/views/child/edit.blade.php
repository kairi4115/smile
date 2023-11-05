@extends('layouts.app')

@section('content')

</style>
<div class="container mt-3">
    <a href="{{ url('/child') }}">戻る</a>
    <div class="border rounded p-3" style="max-width: 720px; margin: 0 auto; padding: 20px;">
        <h2 class="text-center">編集フォーム</h2>
       
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

        <form action="{{ route('child.update', ['id' => $child->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">名前</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="birthdate" class="font-weight-bold">生年月日</label>
                <input type="date" name="birthdate" id="birthdate" required class="form-control">
            </div>

            <div class="form-group">
                <label for="address" class="font-weight-bold">住所</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone_number" class="font-weight-bold">電話番号</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="profile_picture" class="font-weight-bold">画像アップロード</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="parentname" class="font-weight-bold">保護者名</label>
                <input type="text" name="parentname" id="parentname" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block my-3">送信</button>
        </form>
    </div>
</div>
@endsection
