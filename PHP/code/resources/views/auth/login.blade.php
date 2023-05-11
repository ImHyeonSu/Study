@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="email" value="{{ old('email') }}">
        <input type="password" name="password">
        <input type="checkbox" name="remember">

        <button type="submit">ログイン</button>
    </form>

    <a href="{{ route('password.request') }}">暗証番号再設定</a>
    @each('auth.social', $providers, 'provider')
    <!-- 説明ーauth.socialというviewでproviderを変数名にしてauth.socialviewで使えでいう意味-->
    <!-- 
    @foreach ($providers as $provider)
        <a href="{{ route('login.social, $provider')}}">{{ $provider->name}}</a>
    @endforeach
    -->
@endsection
