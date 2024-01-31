@extends('layouts.app')

@section('content')

<div class="bowel-container">
<h1> 排泄記録</h1>
<a href="{{url('bowel/index') }}">戻る</a>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message')}}
</div>

@endif

<form action="{{ route('bowel.store') }}" method="POST">
    @csrf

    <div class="form-group">
    <label for="name">名前</lavel>
    <input type="name" name="name" class="form-control">
    </div>

    <div class="form-group">
    <label for="date">日付</label>
    <input type="date" name="date" class="form-control">
    </div>

    <div class="form-group">
    <label for="time">時間</label>
    <input type="time" name="time" class="form-control">
    </div>

    <div class="form-group">
    <label>便の形態</label>
    <div>
      <input type="checkbox" name="type[]" id="type_solid" value="柔らかい">
      <label for="type_soft">柔らかい</label>
 
      <input type="checkbox" name="type[]" id="type_diarrhea" value="硬い">
      <label for="type_hard">硬い</label>
   
    </div>

    <div class="form-group" id="stool-form" style="display:none;">
      <label for="stool">便の状態</label>
  
      <input type="radio" name="stool_type" id="stool_type_soft" value="水溶便">
      <label for="stool_type_soft">水溶便</label>
   
      <input type="radio" name="stool_type" id="stool_type_hard" value="硬い">
      <label for="stool_type_hard">硬い</label>
    </div>

    <div class="form-group">
    <label for="notes">注意事項</label>
    <textarea name="notes" class="form-control" ></textarea>
    </div>

    <button type="submit">保存</button>
</form>
@endsection