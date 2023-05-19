@extends('layouts.app')

@section('title', 'ブログ管理')

@section('content')
    @include('dashboard.menu')

    <a href="{{ route('blogs.create') }}">新しいブログ</a>

    <ul>
        @foreach ($blogs as $blog)
            <li>
                <a href="{{ route('blogs.show', $blog) }}">{{ $blog->display_name }}</a>
                <a href="{{ route('blogs.edit', $blog) }}">ブログ管理</a>
            </li>
        @endforeach
    </ul>
@endsection
