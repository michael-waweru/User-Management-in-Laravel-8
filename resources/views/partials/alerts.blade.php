@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Error!</strong> {{ session('error') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ session('status') }}
    </div>
@endif
