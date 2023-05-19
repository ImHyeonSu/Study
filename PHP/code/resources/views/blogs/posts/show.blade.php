@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <header>
        <h1>{{ $post->title }}</h1>
        <!-- ＠canは権限の確認 -->
        @can(['update', 'delete'], $post)
            <ul>
                <li>
                    <a href="{{ route('posts.edit', $post) }}">修正</a>
                </li>
                <li>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">削除</button>
                    </form>
                </li>
            </ul>
        @endcan
    </header>

    <article>{{ $post->content }}</article>
    
    <ul>
        @foreach ($post->attachments as $attachment)
            <li><!-- $attachment->link->pathに近つくのが必要  -->
                <a href="{{ $attachment->link->path }}" download="{{ $attachment->original_name }}">
                    {{ $attachment->original_name }}
                </a>
            </li>
        @endforeach
    </ul>

    <div>
        <form action="{{ route('posts.comments.store', $post) }}" method="POST">
            @csrf

            <textarea name="content">{{ old('content') }}</textarea>

            <button type="submit">コメント</button>
        </form>

        <h3>{{ $post->comments_count . "個のコメントがあります。" }}</h3>

        <ul>
            @foreach($comments as $comment)
                <li>
                    <ul>
                        @include('blogs.posts.show.comments.item')

                        <li>
                            <!-- 説明ー以下のtrashedはコメントが削除されたのかを確認 -->
                            @unless($comment->trashed())
                                <form action="{{ route('posts.comments.store', $comment->commentable) }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <textarea name="content">{{ old('content') }}</textarea>

                                    <button type="submit">返信</button>
                                </form>
                            @endunless
                        </li>

                        <li>
                            <ul>
                                @each('blogs.posts.show.comments.item', $comment->replies, 'comment')
                            </ul>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
