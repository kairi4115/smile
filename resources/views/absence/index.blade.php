@extends('layouts.app')

@section('content')

<div class="form">
    <div class="form">
        <a href="{{ url('absence/create') }}">欠席報告へ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">名前</th>
                    <th scope="col">日付</th>
                    <th scope="col">欠席理由</th>
                    <th scope="col">連絡事項</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>

            <tbody>
                @foreach($AbsenceReports as $AbsenceReport)
                <tr>
                    <td>{{ $AbsenceReport->child_id }}</td>
                    <td>{{ $AbsenceReport->date }}</td>
                    <td>{{ $AbsenceReport->reason }}</td>
                    <td>{{ $AbsenceReport->note }}</td>

                    <td>
                        <a href="{{ route('absence.edit', ['id' => $AbsenceReport->id]) }}" class="btn btn-edit"><i class="far fa-edit"></i> 編集</a>
                    </td>

                    <td>
                        <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $AbsenceReport->id }}"><i class="far fa-trash-alt"></i> 削除</button>
                    </td>
                </tr>
                
                <!-- モーダル　-->
                <div class="modal fade" id="deleteModal-{{ $AbsenceReport->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $AbsenceReport->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel-{{ $AbsenceReport->id }}">削除の確認</h5>
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
                                <form action="{{ route('absence.destroy', ['id' => $AbsenceReport->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete"><i class="far fa-trash-alt"></i> 削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
