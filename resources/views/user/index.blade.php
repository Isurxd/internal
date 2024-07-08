@extends('layouts.backend')
@section('content')
    <h6 class="mb-0 text-uppercase">ini adalah isi index user</h6>
    <hr>
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="col-lg-2 justify-content-between mt-2 ms-auto">
            <a href="{{ route('user.create') }}" class="btn btn-success px-4 raised d-flex gap-2">
                <i class="material-icons-outlined">account_circle</i>
                Add User
            </a>
        </div>
            <table class="table mb-0 table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">IsAdmin?</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->is_admin ? 'Admin' : 'User' }}</td>
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}"
                                        class="btn btn-grd btn-grd-primary px-5">Edit</a>
                                    <button type="submit" class="btn btn-grd btn-grd-danger px-5"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                        Delete
                                    </button>
                                    </a>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
