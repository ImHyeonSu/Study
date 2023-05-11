@extends('layouts.app')

@section('title', '新しい暗証番号')

@section('content')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="email" name="email">
        <input type="password" name="password">
        <!-- 暗証番号強制的に変える、tokenの確認 -->
        <input type="password" name="password_confirmation">
        <input type="hidden" name="token" value="{{ $token }}">

        <button type="submit">新しい暗証番号設定</button>
    </form>
@endsection
