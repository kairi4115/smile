@extends('layouts.app')

@section('content')

<style>
/* bowel.create */

/* 一般的なスタイル */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    color: #343a40;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    color: #0056b3;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="name"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

input[type="checkbox"] {
    margin-right: 5px;
}

button {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

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