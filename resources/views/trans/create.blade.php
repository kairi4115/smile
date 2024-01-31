@extends('layouts.app')

@section('content')

<div class="trans-container">
    <a href="{{ url('trans/index') }}">戻る</a>
    <h1>送迎記録</h1>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <!-- 送迎記録作成フォーム -->
    <form method="POST" action="{{ route('trans.store') }}">
        @csrf
        <div class="form-group">
            <label for="child_name">児童名</label>
            <select name="child_name" id="child_name" class="form-control">
                @foreach($childs as $child)
                <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="transport_date">日付</label>
            <input type="date" name="transport_date" id="transport_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="departure_location">出発場所</label>
            <input type="text" name="departure_location" id="departure_location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="destination">到着場所</label>
            <input type="text" name="destination" id="destination" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="passenger_name">乗車職員名</label>
            <input type="text" name="passenger_name" id="passenger_name" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">送迎記録を作成</button>
    </form>
</div>
@endsection
