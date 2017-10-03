@extends('layout.master')

@section('title')
    NBA Homepage
@endsection

@section('header-title')
    NBA Teams
@endsection

@section('header-desc')
    List of all NBA teams
@endsection

@section('content')
    @foreach ($teams as $team)

        <div class="blog-post">
          <h2 class="blog-post-title"><a href="{{ route('single-team', ['id' => $team->id]) }}">{{ $team->name }}</a></h2>
          <p class="blog-post-meta"><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></p>
          <hr>
        </div>

    @endforeach
@endsection
