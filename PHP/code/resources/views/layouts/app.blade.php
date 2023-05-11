<!DOCTYPE html>
<!--register.blade.php 説明ーlayouts/app.blade.php をもらってる  
        /*oldはデータをサーバーに送って問題があらばまた入力のためのコード 
        CSRFの場合はサーバーへの攻撃を守る*/-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ララベル - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">ホーム</a></li>
                <li>
                    <form action="{{ route('search') }}" method="GET">
                        <input type="search" name="query" placeholder="search...">

                        <button type="submit">検索</button>
                    </form>
                </li>
                @guest
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">会員登録</a></li>
                @else
                    <li><a href="{{ route('profile.show') }}">マイページ</a></li>
                    <li><a href="{{ route('dashboard.blogs') }}">ダッシュボード</a></li>
                    <li><a href="{{ route('blogs.index') }}">ブログ</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (session()->has('status'))
            <div>{{ session()->get('status') }}</div>
        @endif

        <main>@yield('content')</main>

        @auth
            <script type="module">
                const id = "{{ auth()->user()->id }}"

                Echo.private(`App.Models.User.${id}`)
                    .notification(n => {
                        switch (n.type) {
                            case 'App\\Notifications\\Subscribed':
                                return console.log(n.user)
                            case 'App\\Notifications\\Published':
                                return console.log(n.post)
                        }
                    })
            </script>
        @endauth
    </body>
</html>
