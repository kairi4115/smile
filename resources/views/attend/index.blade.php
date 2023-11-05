@extends('layouts.app')

@section('content')



<div class="container">
    <div class="dashboard">
       <a href="{{ url('attend/create') }}">出勤登録へ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">名前</th>
                    <th scope="col">日付</th>
                    <th scope="col">出席状況</th>
                    <th scope="col">出勤時刻</th>
                    <th scope="col">退勤時刻</th>
                    <th scope="col">注意事項</th>
                </tr>
            </thead>

            <tbody>
                @foreach($Attends as $Attend)
                <tr>
                    <th scope="row">{{ $Attend->child_id}}</th>
                    <th scope="row">{{ $Attend->date }}</th>
                    <th scope="row">{{ $Attend->present }}</th>
                    <th scope="row">{{ $Attend->arrival_time }}</th>
                    <th scope="row">{{ $Attend->departure_time }}</th>
                    <th scope="row">{{ $Attend->notes }}</th>
                    <td>
                        <a href="{{ route('attend.edit', ['id' => $Attend->id]) }}" class="btn btn-edit"><i class="far fa-edit"></i> 編集</a>
                    </td>
                    <td>
                    <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $Attend->id }}">
                    <i class="far fa-trash-alt"></i> 削除
                   </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- 削除モーダル　-->
        @foreach($Attends as $Attend )

    <!-- モーダル -->
    <div class="modal fade" id="deleteModal-{{ $Attend->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $Attend->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $Attend->id }}">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
                <!-- ... -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <form action="{{ route('attend.destroy', ['id' => $Attend->id]) }}" method="POST">
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