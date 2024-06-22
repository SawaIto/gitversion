@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メモ編集</h1>

        @can('update', $memo)
            <form action="{{ route('memos.update', $memo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $memo->title }}" required>
                </div>

                <div class="form-group">
                    <label for="content">内容</label>
                    <textarea name="content" id="content" class="form-control" required>{{ $memo->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">更新</button>
            </form>

            <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        @else
            <p>このメモを編集する権限がありません。</p>
        @endcan
    </div>
@endsection