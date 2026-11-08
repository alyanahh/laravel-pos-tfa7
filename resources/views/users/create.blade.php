@extends('layouts.app')

@section('title', 'Create User | POS System')

@section('content')

<h2>Create User</h2>

<p>Enter the new user's information below.</p>

@if ($errors->any())
    <div style="background:#fee2e2; color:#991b1b;
                padding:15px; border-radius:10px; margin-bottom:20px;">

        <strong>Please fix the following errors:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

<form action="{{ route('users.store') }}" method="POST">

    @csrf

    <div style="margin-bottom:18px;">
        <label><strong>Username *</strong></label>

        <input
            type="text"
            name="username"
            value="{{ old('username') }}"
            placeholder="Enter username"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <div style="margin-bottom:18px;">
        <label><strong>Full Name *</strong></label>

        <input
            type="text"
            name="full_name"
            value="{{ old('full_name') }}"
            placeholder="Enter full name"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <div style="margin-bottom:18px;">
        <label><strong>Password *</strong></label>

        <input
            type="password"
            name="password"
            placeholder="Enter password (minimum 8 characters)"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <div style="margin-bottom:22px;">
        <label><strong>Confirm Password *</strong></label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm password"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <button
        type="submit"
        style="background:#7e22ce; color:white; border:none;
               padding:12px 22px; border-radius:8px; cursor:pointer;"
    >
        Save User
    </button>

    <a
        href="{{ route('users.index') }}"
        style="display:inline-block; margin-left:10px;
               color:#6d28d9; text-decoration:none;"
    >
        Cancel
    </a>

</form>

@endsection