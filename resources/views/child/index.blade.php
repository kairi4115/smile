@extends('layouts.app')

@section('content')

    
<div class="container">
    <div class="dashboard-child"> 
       <h1 class="my-4">Child Dashboard</h1> 
        <p>Welcome to the child management dashboard. Here you can view and manage child records.</p>
        <a href="{{ url('child/create') }}" class="btn btn-primary">児童登録へ</a>
        <a href="{{ url('home') }}" class="btn btn-primary">トップ画面へ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead class="thead-dark">
                <tr>
                    
                   <th scope="col">ID</th>
                   <th scope="col">画像</th>
                    <th scope="col">名前</th>
                    <th scope="col">生年月日</th>
                    <th scope="col">住所</th>
                    <th scope="col">電話番号</th>
                    <th scope="col">保護者名</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>

            <tbody>
            @foreach($childs as $child)
        <tr>
        <th scope="row">{{ $child->id }}</th>
        <td style="max-width: 100px;">
        <img src="{{ asset('images/' . $child->image) }}" class="img-fluid image" alt="{{ $child->image }}の画像" >
        </td>
        <td>{{ $child->name }}</td>
        <td>{{ $child->birthdate }}</td>
        <td>{{ $child->address }}</td>
        <td><{{ $child->phone_number }}</td>
        <td>{{ $child->parentname }}</td>
        <td>
        <a href="{{ route('child.edit', $child->id) }}" class="btn btn-info"><i class="far fa-edit"></i> 編集</a>
       </td>
       <td>
        <form action="{{ route('child.destroy', $child->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $child->id }}"><i class="far fa-trash-alt"></i> 削除</button>
        </form>
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 削除モーダル -->
@foreach($childs as $child)
<div class="modal fade" id="deleteModal-{{ $child->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $child->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $child->id }}">削除の確認</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form action="{{ route('child.destroy', $child->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> 削除</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection



    


              