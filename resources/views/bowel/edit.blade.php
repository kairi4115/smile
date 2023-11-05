
@extends('layouts.app')

@section('content')


<style>
/* スタイリッシュなフォーム全体のスタイル */
.form-container {
    max-width: 600px;
    margin: 20px auto;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #007bff;
}

.form-link {
    display: block;
    text-align: right;
    margin-top: 10px;
}

/* スタイリッシュなボタンスタイル */
.form-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.form-button:hover {
    background-color: #0056b3;
}

/* スタイリッシュなフォームエレメントスタイル */
.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-checkbox {
    margin-right: 5px;
}

.form-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}


</style>

<div class="form-container">
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
    <label for="name" class="form-label">名前</label>
    <input type="text" name="name" class="form-input" required>
    </div>

    <div class="form-group">
    <label for="date" class="form-label">Date:</label>
    <input type="date" name="date" class="form-input" required>
    </div>

    <div class="form-group">
    <label for="time" class="form-label">Time:</label>
    <input type="time" name="time" class="form-input" required>
    </div>

    <div class="form-group">
    <label class="form-label">Type:</label>
    <input type="checkbox" name="type[]" id="type_solid" value="solid" class="form-checkbox">柔らかい
    <input type="checkbox" name="type[]" id="type_diarrhea" value="diarrhea" class="form-checkbox">硬い
    </div>


    <div class="form-group" id="stool-form" style="display:none ;">
   <label for="stool" class="form-label">便の形態</label>
   <input type="radio" name="stool_type" id="stool_type_soft" value="soft" class="form-checkbox">水容便
   <input type="radio" name="stool_type" id="stool_type_hard" value="hard" class="form-checkbox">硬い
    </div>


    <div class="form-group">
    <label for="notes" class="form-label">Notes:</label>
    <textarea name="notes" class="form-textarea"></textarea>
    </div>

    <button type="submit" class="form-button">Save</button>
</form>
</div>
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
