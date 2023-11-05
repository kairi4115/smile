@extends('layouts.app')

@section('content')
<!-- 新しい食事記録を入力するフォーム -->
<h3>新しい食事記録を追加</h3>
<form method="POST" action="{{ route('meal-records.store') }}">
    @csrf <!-- CSRF保護 -->
    <div class="form-group">
        <label for="child_id">児童名</label>
        <select name="child_id" id="child_id" class="form-control">
            @foreach($children as $child)
            <option value="{{ $child->id }}">{{ $child->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="record_date">日付</label>
        <input type="date" name="record_date" id="record_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label>食事の種類</label>
        <div class="form-check">
            <input type="radio" name="meal_type" id="morning" class="form-check-input" value="昼" required>
            <label class="form-check-label" for="morning">昼</label>
        </div>
        <div class="form-check">
            <input type="radio" name="meal_type" id="evening" class="form-check-input" value="夜" required>
            <label class="form-check-label" for="evening">夜</label>
        </div>
    </div>
    <div class="form-group">
        <label for="meal_description">食事内容</label>
        <textarea name="meal_description" id="meal_description" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">送信</button>
</form>
