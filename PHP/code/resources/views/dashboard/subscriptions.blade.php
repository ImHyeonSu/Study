@extends('layouts.app')

@section('title', '自分がサブスクリプションしたリスト')

@section('content')
    @include('dashboard.menu')

    <ul>
        @foreach ($blogs as $blog)
            <li><a href="{{ route('blogs.show', $blog) }}">{{ $blog->name }}</a></li>
        @endforeach
    </ul>
@endsection
