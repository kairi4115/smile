@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/smailechildren.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <script src="https://kit.fontawesome.com/2e4b86039b.js" crossorigin="anonymous"></script>
  
    <title>トップページ</title>
</head>
<body>
    <div class="square-container">
        <div class="square">
            <a href="{{ route('child.index') }}">
                <i class="fas fa-user"></i>
                <span>児童登録</span>
            </a>
        </div>
        <div class="square">
            <a href="{{ route('food.index') }}">
                <i class="fas fa-carrot"></i>
                <span>食事記録</span>
            </a>
        </div>
        <div class="square">
            <a href="{{ route('bowel.index') }}">
                <i class="fas fa-toilet-paper"></i>
                <span>排泄記録</span>
            </a>
        </div>
        <div class="square">
            <a href="{{ route('attend.index') }}">
                <i class="fas fa-school"></i>
                <span>出席記録</span>
            </a>
        </div>
        <div class="square">
            <a href="{{ route('trans.index') }}">
                <i class="fas fa-bus"></i>
                <span>送迎記録</span>
            </a>
        </div>
    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
@endsection