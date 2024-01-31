
@extends('layouts.app')

@section('content')


<div class="bowel-container">
<h1 class="form-title">排泄編集</h1>

<a href="{{ route('bowel.index') }}">戻る</a>

@if(session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif

<form action="{{route('bowel.update', ['id' => $Bowel->id]) }}" method="POST">
    @csrf
    
    <div class="form-group">
    <label for="name" class="form-input">名前</label>
    <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="date" class="form-input">日付</label>
    <input type="date" name="date" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="time" class="form-input">時間</label>
    <input type="time" name="time" class="form-control" required>
    </div>

    <div class="form-group">
    <label class="form-input">時間</label>
    <input type="checkbox" name="type[]" id="type_solid" value="solid" class="form-checkbox">柔らかい
    <input type="checkbox" name="type[]" id="type_diarrhea" value="diarrhea" class="form-checkbox">硬い
    </div>


    <div class="form-group" id="stool-form" style="display:none ;">
   <label for="stool" class="form-input">便の形態</label>
   <input type="radio" name="stool_type" id="stool_type_soft" value="soft" class="form-checkbox">水容便
   <input type="radio" name="stool_type" id="stool_type_hard" value="hard" class="form-checkbox">硬い
    </div>


    <div class="form-group">
    <label for="notes" class="form-input">注意事項:</label>
    <textarea name="notes" class="form-control"></textarea>
    </div>

    <button type="submit" class="form-input">保存</button>
</form>
</div>
@endsection
