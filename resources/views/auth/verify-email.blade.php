@extends('templates.main')

@section('content')
    <h1>Verify Email</h1>
    <p>You must verify your email to access this page</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Resend verification email</button>
    </form>
@endsection
