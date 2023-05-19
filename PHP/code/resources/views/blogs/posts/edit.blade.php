@extends('layouts.app')

@section('title', '修正')

@section('content')
    <!-- 説明ーenctype="multipart/form-data" これが添付ファイルの設定 -->
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $post->title) }}" required autofocus>
        <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
        <!-- これが添付ファイルの設定-->
        <input type="file" name="attachments[]" multiple>

        <button type="submit">修正</button>
    </form>

    <ul>
        @foreach ($post->attachments as $attachment)

            <li>
                <!--添付ファイルを削除するところ -->
                <a href="{{ $attachment->link->path }}" download="{{ $attachment->original_name }}">
                    {{ $attachment->original_name }}
                </a>

                @can('delete', $attachment)
                    <form action="{{ route('attachments.destroy', $attachment) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">削除</button>
                <!--最初のコード
                    @foreach ($blog->posts as $post)
                        <li> 
                            <a href="{{ route('posts.show', $post) }}"> {{ $post->title}}</a> 
                            <a href="{{ route('posts.edit', $post) }}"> 修正</a>
                            <form action="{{ route('posts.destory', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">削除</button>
                        </li>
                    @endforeach
                </ul>
            -->                        
                    </form>
                @endcan
            </li>
        @endforeach
    </ul>
@endsection
