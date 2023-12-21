<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <form action="{{ route('admin.toggleStatus', $user) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-{{ $user->is_enabled ? 'success' : 'danger' }}">
                                    {{ $user->is_enabled ? 'Disable' : 'Enable' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
