@extends('layouts.app')

@section('title', 'password再設定')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email">

        <button type="submit">password再設定</button>
    </form>
@endsection
