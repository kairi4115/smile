@extends('layouts.app')

@section('content')

<div class="food-container">
<a href="{{ url('/food/index') }}">戻る</a>
    <h3>編集フォーム</h3>
    
 @if ( session('message') )
 <div class="alert alert-success" role="alert">{{ session('message') }}</div>
 @endif
     <form action="{{ route('food.update', ['id' => $record->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF保護 -->
        <div class="form-group">
            <label for="child_id">児童名</label>
            <select name="child_id" class="form-control @error('child_id') is-invalid @enderror"id="child_id" class="form-control">
                @foreach($children as $child)
                <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
            @error('child_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="record_date">日付</label>
            <input type="date" name="record_date" id="record_date" class="form-control" value="{{ $record->record_date }}" >
            @error('record_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>食事の種類</label>
            <div class="form-check">
                <input type="radio" name="meal_type" id="morning" class="form-check-input" value="昼" >
                <label class="form-check-label" for="morning">昼</label>
            </div>
            <div class="form-check">
                <input type="radio" name="meal_type" id="evening" class="form-check-input" value="夜" >
                <label class="form-check-label" for="evening">夜</label>
            </div>
            @error('meal_type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="meal_description">食事内容</label>
            <textarea name="meal_description" class="form-control @error('meal_description') is-invalid @enderror"id="meal_description" class="form-control" rows="3">{{ $record->meal_description }}</textarea>
            @error('meal_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="meal_amount">食事の分量</label>
             <div id="quantityOptions">
                <div class="quantity-option" onclick="selectQuantity(1)">1/4</div>
                <div class="quantity-option" onclick="selectQuantity(2)">2/4</div>
                <div class="quantity-option" onclick="selectQuantity(3)">3/4</div>
                <div class="quantity-option" onclick="selectQuantity(4)">4/4</div>
             </div>

             <input type="text" id="selected_meal_amount" name="meal_amount" style="display: none;">
             @error('meal_amount')
               <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</div>

@endsection