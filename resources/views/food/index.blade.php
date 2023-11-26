@extends('layouts.app')

@section('content')

<div class="form-container">
    <div class="dashboard">
        <h2>食事記録</h2>
        <a href="{{ route('food.create') }}">食事記録へ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">児童名</th>
                    <th scope="col">食事の種類</th>
                    <th scope="col">食事内容</th>
                    <th scope="col">食事の分量</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>

            <tbody>
                {{-- Loop through your food records here --}}
                @foreach($records as $record)
                <tr>
                    <td>{{ $record->record_date }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->meal_type }}</td>
                    <td>{{ $record->meal_description }}</td>
                    <td>{{ $record->meal_amount }}</td>
                    <td>
                        <a href="{{ route('food.edit', ['id' => $record->id]) }}" class="btn btn-edit"><i class="far fa-edit"></i> 編集</a>
                    </td>
                    <td>
                        <form action="{{ route('food.destroy', ['id' => $record->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $record->id }}"><i class="far fa-trash-alt"></i> 削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 削除モーダル -->
@foreach($records as $record)
<div class="modal fade" id="deleteModal-{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $record->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $record->id }}">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <form action="{{ route('food.destroy', ['id' => $record->id]) }}" method="POST">
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




