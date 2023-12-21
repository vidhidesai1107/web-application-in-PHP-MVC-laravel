<p>
    Hello {{ $user->name }},

    Click the following link to verify your email:
    <a href="{{ route('verification.verify', ['id' => $user->id]) }}">Verify Email</a>
</p>
