@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メモ作成</h1>

        @can('create', \App\Models\Memo::class)
            <form action="{{ route('memos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">内容</label>
                    <textarea name="content" id="content" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">作成</button>
            </form>
        @else
            <p>メモを作成する権限がありません。</p>
        @endcan
    </div>
@endsection