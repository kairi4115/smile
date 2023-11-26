@extends('layouts.app')

@section('content')

</style>
<div class="container">
<h1> 排泄記録</h1>
<a href="{{url('bowel/index') }}">戻る</a>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message')}}
</div>
</div>
@endif

<form action="{{ route('bowel.store') }}" method="POST">
    @csrf

    <div class="form-group">
    <label for="name">名前</lavel>
    <input type="name" name="name" required>
    </div>

    <div class="form-group">
    <label for="date">Date:</label>
    <input type="date" name="date" required>
    </div>

    <div class="form-group">
    <label for="time">Time:</label>
    <input type="time" name="time" required>
    </div>

    <div class="form-group">
    <label>Type:</label>
    <input type="checkbox" name="type[]" id="type_solid" value="solid">柔らかい
    <input type="checkbox" name="type[]" id="type_diarrhea" value="diarrhea">硬い
    </div>
   
    <div class="form-group" id="stool-form" style="display:none ;">
    <label for="stool">便の形態</label>
     <input type="radio" name="stool_type" id="stool_type_soft" value="soft">水溶便
     <input type="radio" name="stool_type" id="stool_type_hard" value="hard">硬い
</div>

    <div class="form-group">
    <label for="notes">Notes:</label>
    <textarea name="notes"></textarea>
    </div>

    <button type="submit">Save</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSolidCheckbox = document.getElementById('type_solid');
    const stoolForm = document.getElementById('stool-form');

    typeSolidCheckbox.addEventListener('change', function() {
        if(typeSolidCheckbox.checked) {
            stoolForm.style.display = 'block';
        }else {
            stoolForm.style.display = 'none';
        }
    });
});

</script>

@endsection