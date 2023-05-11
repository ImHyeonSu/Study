@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <form action="{{ route('profile.edit') }}" method="GET">
        <input type="text" name="name" value="{{ old('name', $user->name) }}" readonly disabled>
        <input type="email" name="email" value="{{ $user->email }}" readonly disabled>

        <button type="submit">個人情報変更</button>
    </form>
@endsection
