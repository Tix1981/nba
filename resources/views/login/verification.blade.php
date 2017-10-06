@extends('layout.master')

@section('title')
    Account verification
@endsection

@section('header-title')
    Account verification
@endsection

@section('header-desc')
    Congratulations, your account is verified!
@endsection

@section('content')

    <h3>Welcome {{ $user->name }}. Click <a href="{{ route('login') }}">here</a> for login</h3>

@endsection
