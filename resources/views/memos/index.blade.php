@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メモ一覧</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @can('create', \App\Models\Memo::class)
            <a href="{{ route('memos.create') }}" class="btn btn-primary mb-3">新規作成</a>
        @endcan

        <table class="table">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>作成日時</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memos as $memo)
                    <tr>
                        <td>{{ $memo->title }}</td>
                        <td>{{ $memo->created_at }}</td>
                        <td>
                            <a href="{{ route('memos.show', $memo->id) }}" class="btn btn-info">詳細</a>
                            @can('update', $memo)
                                <a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-primary">編集</a>
                            @endcan
                            @can('delete', $memo)
                                <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $memos->links() }}
    </div>
@endsection