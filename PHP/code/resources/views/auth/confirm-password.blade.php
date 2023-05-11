@extends('layouts.app')

@section('title', '暗証番号確認')

@section('content')
    <form action="{{ route('password.confirm') }}" method="POST">
        @csrf
        <input type="password" name="password">

        <button type="submit">暗証番号確認</button>
    </form>
@endsection
