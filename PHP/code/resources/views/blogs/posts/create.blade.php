@extends('layouts.app')

@section('title', '書き物')

@section('content')
    <!-- 説明ーenctype="multipart/form-data" これが添付ファイルの設定 -->
    <form action="{{ route('blogs.posts.store', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" value="{{ old('title') }}" required autofocus>
        <textarea name="content" required>{{ old('content') }}</textarea>
        <!--これが添付ファイルの設定-->
        <input type="file" name="attachments[]" multiple>

        <button type="submit">書き物</button>
    </form>
@endsection
