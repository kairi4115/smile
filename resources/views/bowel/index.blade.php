@extends('layouts.app')

@section('content')
<style>
/* スタイリッシュなヘッダー */
h1 {
    font-size: 2em;
    color: #333; /* テキストの色を調整 */
}

/* 新しい記録を作成リンク */
a[href^="{{ url('bowel/create') }}"] {
    background-color: #007BFF; /* リンクの背景色を変更 */
    color: #FFF; /* リンクのテキスト色を変更 */
    padding: 10px 15px; /* パディングを調整 */
    border-radius: 5px; /* 角丸にする */
    text-decoration: none;
}

/* アラートメッセージ */
.alert {
    background-color: #28A745; /* アラートの背景色を変更 */
    color: #FFF; /* アラートのテキスト色を変更 */
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
}

/* テーブルスタイル */
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #CCC; /* テーブルのボーダーを追加 */
    padding: 8px;
    text-align: left;
}

thead {
    background-color: #007BFF; /* ヘッダーの背景色を変更 */
    color: #FFF; /* ヘッダーのテキスト色を変更 */
}

/* ボタンスタイル */
.btn-edit, .btn-delete {
    background-color: #007BFF; /* ボタンの背景色を変更 */
    color: #FFF; /* ボタンのテキスト色を変更 */
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    margin-right: 5px;
}

.btn-delete {
    background-color: #DC3545; /* 削除ボタンの背景色を変更 */
}

/* モーダルスタイル */
.modal-dialog {
    max-width: 400px; /* モーダルの最大幅を設定 */
}

.modal-title {
    font-size: 1.5em;
    color: #333; /* モーダルのタイトルのテキスト色を変更 */
}

.modal-body {
    font-size: 1.2em;
    color: #555; /* モーダルの本文のテキスト色を変更 */
}

.modal-footer {
    justify-content: space-between;
}

</style>
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
