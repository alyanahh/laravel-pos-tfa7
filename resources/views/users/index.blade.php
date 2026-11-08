@extends('layouts.app')

@section('title', 'User Accounts | POS System')

@section('content')

<h2>User Accounts</h2>

<p>List of registered system users.</p>

@if (session('success'))
    <div style="background:#dcfce7; color:#166534;
                padding:15px; border-radius:10px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('users.create') }}"
   style="display:inline-block; background:#7e22ce; color:white;
          padding:12px 18px; border-radius:8px;
          text-decoration:none; margin-bottom:15px;">

    + Add New User

</a>

<table>
    <thead>
        <tr>
            <th>Avatar</th>
            <th>ID</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($users as $user)

            <tr>

                <td>
                    <img
                        src="{{ $user->avatar
                            ? asset('storage/' . $user->avatar)
                            : asset('images/avatar-placeholder.svg') }}"
                        alt="{{ $user->full_name }}"
                        width="55"
                        height="55"
                        style="border-radius:50%; object-fit:cover;
                               border:2px solid #a855f7;"
                    >
                </td>

                <td>{{ $user->id }}</td>

                <td>{{ $user->full_name }}</td>

                <td>{{ $user->username }}</td>

                <td>
                    <a
                        href="{{ route('users.edit', $user->id) }}"
                        style="background:#7e22ce; color:white;
                               padding:7px 12px; border-radius:6px;
                               text-decoration:none;"
                    >
                        Edit
                    </a>
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5">No users found.</td>
            </tr>

        @endforelse

    </tbody>
</table>

<p>Total users: {{ $users->count() }}</p>

@endsection