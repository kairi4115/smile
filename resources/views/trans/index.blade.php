@extends('layouts.app')

@section('content')

<div class="container">
    <div class="dashboard">
        <h1 class="my-4">送迎表</h1>
        <a href="{{ url('trans/create') }}">送迎作成</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">児童名</th>
                    <th scope="col">送迎日</th>
                    <th scope="col">出発場所</th>
                    <th scope="col">到着場所</th>
                    <th scope="col">乗車職員名</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tranes as $trans)
                <tr>
                    <td>{{ $trans->child_name }}</td>
                    <td>{{ $trans->transport_date }}</td>
                    <td>{{ $trans->departure_location }}</td>
                    <td>{{ $trans->destination }}</td>
                    <td>{{ $trans->passenger_name }}</td>
                    <td>
                        <a href="{{ route('trans.edit', ['id' => $trans->id]) }}" class="btn btn-edit"><i class="far fa-edit"></i> 編集</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $trans->id }}"><i class="far fa-trash-alt"></i> 削除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 削除モーダル -->
@foreach($tranes as $trans)
<div class="modal fade" id="deleteModal-{{ $trans->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $trans->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $trans->id }}">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <form action="{{ route('trans.destroy', ['id' => $trans->id]) }}" method="POST">
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
