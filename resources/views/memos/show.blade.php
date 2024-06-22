@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メモ詳細</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $memo->title }}</h3>
            </div>
            <div class="card-body">
                <p>{{ $memo->content }}</p>
            </div>
            <div class="card-footer">
                <p>作成日時: {{ $memo->created_at }}</p>
                <p>更新日時: {{ $memo->updated_at }}</p>
            </div>
        </div>

        @can('update', $memo)
            <a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-primary mt-3">編集</a>
        @endcan

        @can('delete', $memo)
            <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        @endcan

        <a href="{{ route('memos.index') }}" class="btn btn-secondary mt-3">戻る</a>
    </div>
@endsection