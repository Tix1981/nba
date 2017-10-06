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
      <ul class="unstyled">
          @foreach ($team->players as $player)
              <li>
                  <a href="{{ route('single-player', ['id' => $player->id]) }}">{{ $player->first_name }} {{ $player->last_name }}</a>
              </li>
          @endforeach
      </ul>
    </div>
    <hr>
    <ul class="unstyled">
        @foreach ($team->comments as $comment)
            <li>
                <p>
                    {{ $comment->content }} by {{ $comment->user->name }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>

    <h2>Leave a comment</h2>

    <form method="POST" action="{{ route('team-comments', ['team_id' => $team->id]) }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="email" class="form-control" id="content" name="content"></textarea>
            @include('partials.error-message', ['fieldTitle' => 'content'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>


@endsection
