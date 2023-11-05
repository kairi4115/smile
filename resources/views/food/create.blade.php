@extends('layouts.app')

@section('content')



<!-- 新しい食事記録を入力するフォーム -->
<div class="container">
<link href="{{asset('css/smilechildren.css') }}" rel="stylesheet">
    <a href="{{ url('/food/index') }}">戻る</a>
    <h3>新しい食事記録を追加</h3>
    
    @if ( session('message') )
        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('food.store') }}">
        @csrf <!-- CSRF保護 -->
        <div class="form-group">
            <label for="child_id">児童名</label>
            <select name="child_id" class="form-control @error('child_id') is-invalid @enderror" id="child_id">
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
            <input type="date" name="record_date" id="record_date" class="form-control" required>
            @error('record_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
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
            @error('meal_type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="meal_description">食事内容</label>
            <textarea name="meal_description" class="form-control @error('meal_description') is-invalid @enderror" id="meal_description" rows="3" required></textarea>
            @error('meal_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="meal_amount">食事の分量</label>
            <div id="quantityOptions">
                <!-- 正方形のボックス1 -->
                <div class="quantity-option" onclick="selectQuantity(1)">1/4</div>
                <!-- 正方形のボックス2 -->
                <div class="quantity-option" onclick="selectQuantity(2)">2/4</div>
                <!-- 正方形のボックス3 -->
                <div class="quantity-option" onclick="selectQuantity(3)">3/4</div>
                <!-- 正方形のボックス4 -->
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

<script>
// 選択された分量を保持する変数
var selectedQuantity = 0;

// ボックスをクリックしたときの処理
function selectQuantity(portion) {
    selectedQuantity = portion;
    updateQuantityStyle(selectedQuantity);
    updateMealAmountField(selectedQuantity);
}

// 選択された分量に応じてボックスのスタイルを更新する関数
function updateQuantityStyle(selectedQuantity) {
    const quantityOptions = document.querySelectorAll('.quantity-option');

    quantityOptions.forEach((option, index) => {
        if (index === selectedQuantity - 1) {
            option.style.backgroundColor = '#CCCC99';
        } else {
            option.style.backgroundColor = 'lightblue';
        }
    });

    // 選択された食事の分量をフォームに設定
    document.getElementById('selected_meal_amount').value = selectedQuantity + '/4';
}

// ページ読み込み時に初期スタイルを設定
window.onload = () => {
    selectQuantity(1);
};

// ボックスをクリックしたときに更新
const quantityOptions = document.querySelectorAll('.quantity-option');

quantityOptions.forEach((option, index) => {
    option.addEventListener('click', () => {
        selectQuantity(index + 1);
    });
});

</script>

@endsection
