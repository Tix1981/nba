<h2>
    Hello {{ $user->name }}
</h2>

<p>Please, click on link bellow to verify your account</p>

<a href="{{ route('verification', ['id' => $user->id ]) }}">Verification link</a>
