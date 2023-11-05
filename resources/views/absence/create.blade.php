@extends('layouts.app')

@section('content')
<style>
    /* ページ全体の背景色を設定　*/
   body {
      background-color: #f8f9fa;
   }

   /* フォーム要素スタイル　*/
   .form-container {
         background-color: #fff;
         border: 1px solid #dce0e5;
         border-radius: 5px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         padding: 20px;
         max-width: 600px;
         margin: 0 auto;
   }

   /* フォームヘッダーのスタイル　*/
   .form-container h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
   }

   /* ボタンのスタイル　*/
   .btn-primary {
    background-color: #007bff;
    border: none;
   }

   .btn-primary:hover {
    background-color: #0056b3;
   }

   </style>

<div class="form-container">
    <a href="{{url('absence/index') }}">戻る</a>
    <h1>欠席連絡</h1>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
    @endif

    <!-- 欠席報告フォーム　-->
    <form method="POST" action="{{ route('absence.store') }}">
        @csrf
        <div class="form-group">
            <label for="child_id">児童名</label>
            <select name="child_id" id="child_id" class="form-control">
                @foreach($childs as $child)
                <option value="{{ $child->id }}">{{ $child->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">日付</label>
           <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reason">欠席理由</label>
            <textarea name="reason" class="form-control @error('reason') is-invalid @enderror" id="reason" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="note">保育者への連絡事項</label>
            <textarea name="note" class="form-control @error('note') is-invalid @enderror" id="note" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">保存</button>
    </form>

</div>
@endsection
