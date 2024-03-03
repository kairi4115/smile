@extends('layouts.app')

@section('content')

<div class="margin-bottom">
<h1>排泄記録一覧</h1>
</div>

<a href="{{ url('home') }}" class="btn btn-primary">トップ画面へ</a>
<a href="{{ url('bowel/create') }}" class="btn btn-primary">新しい記録を作成</a>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }} 
</div>
@endif

<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>日付</th>
            <th>時間</th> 
            <th>便の形態</th>
            <th>便の形態</th>
            <th>注意事項</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </thead>

    <tbody>
       @foreach($bowels as $bowel)
       <tr>
         <td>{{ $bowel->name }}</td>
         <td>{{ $bowel->date }}</td> 
         <td>{{ $bowel->time }}</td> 
         <td>{{ $bowel->type }}</td>
         <td>{{ $bowel->stool_type }}</td> 
         <td>{{ $bowel->notes }}</td> 
       <td>
         <a href="{{ route('bowel.edit', ['id' => $bowel->id]) }}"  class="btn btn-info"><i class="far fa-edit"></i> 編集</a> 
       </td>
       <td>
         <form action="{{ route('bowel.destroy',['id' => $bowel->id]) }}" method="POST"> <!-- ルート名を指定 -->
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $bowel->id }}"><i class="far fa-trash-alt"> 削除</i></button>
         </form>
       </td>
       </tr> 
       @endforeach
    </tbody>
</table>

<!-- 削除モーダル -->
@foreach($bowels as $bowel)
<div class="modal fade" id="deleteModal-{{ $bowel->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $bowel->id }}" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $bowel->id }}">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <form action="{{ route('bowel.destroy', ['id' => $bowel->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete"><i class="far fa-trash-alt"></i> 削除</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endforeach
@endsection
