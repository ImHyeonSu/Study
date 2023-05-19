@extends('layouts.app')

@section('title', '블로그 목록')

@section('content')
    <ul>
        @foreach ($blogs as $blog)
            <h3><a href="{{ route('blogs.show', $blog) }}">{{ $blog->display_name }}</a></h3>
            <!--説明ー以下の呼び方は効率的ではない、BlogControllerの'blogs'=> Blog::all()と一緒に使う-->    
            <div><!--{{ $blog->user->name }}--></div>
            <div>{{ $blogs->links() }}</div>
        @endforeach
    </ul>

    {{ $blogs->links() }}
@endsection
