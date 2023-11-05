@extends('layouts.app')

@section('content')


<div class="form-container">
    <a href="{{url('attend/index') }}">戻る</a>
    <h1>出勤記録作成フォーム</h1>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
    @endif

 <!-- 出勤記録フォーム　-->
 <form method="post" action="{{ route('parentattent/store') }}">
    @csrf
    <div class="form-group">
        <label for="child_id">子供名</label>
        <select name="child_id" id="child_id" class="form-control">
            @foreach($childs as $child)
             <option value="{{ $child->id }}">{{ $child->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="date">日付</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="present">出席状況</label>
        <select name="present" id="present" class="form-control" required>
            <option value="1">出席</option>
            <option value="0">欠席</option>
        </select>
    </div>

    <div class="form-group">
        <label for="arrival_time">登園時間</label>
        <input type="time" name="arrival_time" id="arrival_time" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="departure_time">退園時間</label>
        <input type="time" name="departure_time" id="departure_time" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="notes">注意事項</label>
        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="note" class="form-control" rows="3"Required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">保存</button>
 </form>
</div>
@endsection