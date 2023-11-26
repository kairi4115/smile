@extends('layouts.app')

@section('content')

<h1>排泄記録一覧</h1>
<a href="{{ url('bowel/create') }}">新しい記録を作成</a>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }} <!-- スペルミスを修正 -->
</div>
@endif

<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>Date</th>
            <th>Time</th> <!-- 大文字に修正 -->
            <th>Type</th>
            <th>便の形態</th>
            <th>Notes</th>
        </tr>
    </thead>

    <tbody>
       @foreach($bowels as $bowel)
       <tr>
         <td>{{ $bowel->name }}</td>
         <td>{{ $bowel->date }}</td> <!-- フィールド名を正確に指定 -->
         <td>{{ $bowel->time }}</td> <!-- フィールド名を正確に指定 -->
         <td>{{ $bowel->type }}</td> <!-- フィールド名を正確に指定 -->
         <td>{{ $bowel->stool_type }}</td> <!-- フィールド名を正確に指定 -->
         <td>{{ $bowel->notes }}</td> <!-- フィールド名を正確に指定 -->
       <td>
         <a href="{{ route('bowel.edit', ['id' => $bowel->id]) }}"  class="btn btn-edit"><i class="far fa-edit"></i> 編集</a> 
       </td>
       <td>
         <form action="{{ route('bowel.destroy',['id' => $bowel->id]) }}" method="POST"> <!-- ルート名を指定 -->
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $bowel->id }}"><i class="far fa-trash-alt"> 削除</i></button>
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
