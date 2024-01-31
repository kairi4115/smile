@extends('layouts.app')

@section('content')


<div class="container">
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
