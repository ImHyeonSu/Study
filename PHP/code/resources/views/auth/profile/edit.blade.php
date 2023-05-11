@extends('layouts.app')

@section('title', 'マイページー個人情報修正')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST">
        @method('PUT') <!-- restful api中putを使うため、基本的にhtmlではget,postだけ支援する -->
        @csrf
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <input type="email" name="email" value="{{ $user->email }}" readonly disabled>
        <!-- セッションでログインした場合暗証番号の変更は無駄 -->
        @if(session()->socialiteMissingAll())
            <input type="password" name="password">
            <input type="password" name="password_confirmation">
        @endif

        <button type="submit">個人情報変更</button>
    </form>
@endsection
