@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-start">Users</h1>
            <a class="btn btn-sm btn-success float-end" href="{{ route('admin.users.create') }}" role="button">Create User</a>
        </div>
    </div>

    <div class="card" style=" padding: 25px 40px;  box-shadow: 0 2px 4px rgba(204, 204, 204, 0.8); margin-bottom:20px;">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $users->firstitem() - 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}" role="button">Edit User</a>
                            <button type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                            document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                                Delete
                            </button>
                            <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display: none">
                                @csrf
                                @method("DELETE")
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
