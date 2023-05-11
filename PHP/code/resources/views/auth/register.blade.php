@extends('layouts.app')

@section('title', '会員登録')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <input type="text" name="email" value="{{ old('email') }}">
        <input type="password" name="password">

        <button type="submit">会員登録</button>
    </form>
    @each('auth.social', $providers, 'provider')
    <!-- 説明ーauth.socialというviewでproviderを変数名にしてauth.socialviewで使えでいう意味-->
    <!-- 
    @foreach ($providers as $provider)
        <a href="{{ route('login.social, $provider')}}">{{ $provider->name}}</a>
    @endforeach
    -->
@endsection
