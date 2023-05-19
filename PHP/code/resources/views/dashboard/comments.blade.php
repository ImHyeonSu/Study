@extends('layouts.app')

@section('title', 'コメント管理')

@section('content')
    @include('dashboard.menu')

    <ul>
        @foreach($comments as $comment)
            <li>
                <a href="{{ route('posts.show', $comment->commentable) }}">{{ $comment->commentable->title }}</a>
                <p>{{ $comment->content }}</p>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
