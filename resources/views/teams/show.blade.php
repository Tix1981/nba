@extends('layout.master')

@section('title')
    {{ $team->name }}
@endsection

@section('header-title')
    {{ $team->name }}
@endsection

@section('header-desc')
    Page for {{ $team->name }}
@endsection

@section('content')

    <div class="blog-post">
      <h2 class="blog-post-title">{{ $team->name }}</h2>
      <p class="blog-post-meta"><strong>Email: </strong><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></p>
      <p class="blog-post-meta"><strong>Address:</strong> {{ $team->address }}</p>
      <p class="blog-post-meta"><strong>City:</strong> {{ $team->city }}</p>
      <p class="blog-post-meta"><strong>{{ $team->name }} players:</strong></p>
      <ul>
          @foreach ($team->players as $player)
              <li>
                  <a href="{{ route('single-player', ['id' => $player->id]) }}">{{ $player->first_name }} {{ $player->last_name }}</p>
              </li>
          @endforeach
      </ul>
    </div>

@endsection
