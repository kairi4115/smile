@extends('layouts.app')

@section('content')

<style>
/* ページ全体の背景色　*/
body {
    background-color: #f8f9fa;
}

/* フォーム全体のスタイル　*/
.form-container {
    background-color: #fff;
    border: 1px solid #dce0e5;
    border-radius: 5px;
    box-shadow: 0 2px 4px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
}

.form-container h1{
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}


.form-control {
    font-size: 16px;
    padding: 10px;
    border: 1px solid #dce0e5;
    border-radius: 4px;
    margin-bottom: 15px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color:#0056b3;
}



</style>
  <div class="form-container">
  <a href="{{url('attend/index')}}">戻る</a>
    <h1>出勤記録編集</h1>
    @if(session('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif

    <!-- 出勤記録作成フォーム　-->
    <form method="POST" action="{{ route('attend.update', ['id' => $Attend->id]) }}">
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
            <label for="notes">注意事項</label>
            <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
  @endsection