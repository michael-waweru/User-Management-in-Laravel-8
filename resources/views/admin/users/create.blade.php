@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-start">Add New User</h1>
            <a class="btn btn-sm btn-success float-end" href="{{ route('admin.users.index') }}" role="button">All Users</a>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('admin.users.store') }}">
           @include('admin.users.partials.form', ['create' => true])
        </form>
    </div>
@endsection
