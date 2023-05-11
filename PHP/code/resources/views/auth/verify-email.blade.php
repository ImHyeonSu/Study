@extends('layouts.app')

@section('title', 'メール認証')

@section('content')
    <strong>メール認証</strong>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit">メール送り</button>
    </form>
@endsection
