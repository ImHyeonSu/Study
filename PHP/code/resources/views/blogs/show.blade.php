@extends('layouts.app')

@section('title', $blog->display_name)

@section('content')
    <header>
        <h3>{{ $blog->display_name }}</h3>

        @auth
            <ul>
                <!--説明ー 以下のcan - update,deleteはBlogPolicyを使ってるBlogControllerの__constructを通じてBlogPolicyのupdate,deleteの有標性検査を行う-->
                @can(['update', 'delete'], $blog)
                    <li><a href="{{ route('blogs.edit', $blog) }}">ブログ管理</a></li>
                @endcan

                @can('create', [\App\Models\Post::class, $blog])
                    <li><a href="{{ route('blogs.posts.create', $blog) }}">書く</a></li>
                @endcan
            </ul>
        @endauth
        <!-- ownedじゃ無ければ以下のボータンが出る -->
        @unless ($owned)
            @unless ($subscribed)
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                    <button type="submit">サブスクリプション</button>
                </form>
            @else
                <form action="{{ route('unsubscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                    <button type="submit">サブスクリプションキャンセル</button>
                </form>
            @endunless
        @endunless
    </header>

    <ul>
        <!-- 書き一覧が出る -->
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}
@endsection
