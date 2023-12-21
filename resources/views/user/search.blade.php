

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Search</h2>
        <form action="{{ route('user.search.submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Username:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Fetch</button>
        </form>

        @if(isset($user))
            <h3>User Details</h3>
            <ul>
                <li>Name: {{ $user->name }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Phone Number: {{ $user->mobile }}</li>
                <li>Language: {{ $user->language }}</li>
               

                
            </ul>
        @endif

        @if(isset($message))
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @endif

    </div>
@endsection
