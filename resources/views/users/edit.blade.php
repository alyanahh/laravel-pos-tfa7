@extends('layouts.app')

@section('title', 'Edit User | POS System')

@section('content')

<h2>Edit User</h2>

<p>Update the user's account information below.</p>

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

<form action="{{ route('users.update', $user->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div style="margin-bottom:18px;">
        <label><strong>Username *</strong></label>

        <input
            type="text"
            name="username"
            value="{{ old('username', $user->username) }}"
            required
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <div style="margin-bottom:18px;">
        <label><strong>Full Name *</strong></label>

        <input
            type="text"
            name="full_name"
            value="{{ old('full_name', $user->full_name) }}"
            required
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <hr style="border:1px solid #e9d5ff; margin:25px 0;">

    <h3>Profile Picture</h3>

    <div style="margin-bottom:18px;">

        <p><strong>Current Avatar</strong></p>

        <img
            src="{{ $user->avatar
                ? asset('storage/' . $user->avatar)
                : asset('images/avatar-placeholder.svg') }}"
            alt="User Avatar"
            width="130"
            height="130"
            style="border-radius:50%; object-fit:cover;
                   border:3px solid #a855f7;"
        >

    </div>

    <div style="margin-bottom:22px;">

        <label><strong>Upload New Profile Picture</strong></label>

        <input
            type="file"
            name="avatar"
            accept=".jpg,.jpeg,.png,.webp"
            style="display:block; margin-top:10px;"
        >

        <small style="color:#6b5a80;">
            Accepted formats: JPG, JPEG, PNG, WEBP.
            Maximum file size: 2MB.
        </small>

    </div>

    <hr style="border:1px solid #e9d5ff; margin:25px 0;">

    <h3>Change Password (Optional)</h3>

    <p>Leave these fields blank if you don't want to change the password.</p>

    <div style="margin-bottom:18px;">

        <label><strong>New Password</strong></label>

        <input
            type="password"
            name="password"
            placeholder="Enter new password"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >

    </div>

    <div style="margin-bottom:22px;">

        <label><strong>Confirm New Password</strong></label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm new password"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >

    </div>

    <button
        type="submit"
        style="background:#7e22ce; color:white; border:none;
               padding:12px 22px; border-radius:8px; cursor:pointer;"
    >
        Update User
    </button>

    <a href="{{ route('users.index') }}"
       style="margin-left:10px; color:#6d28d9;
              text-decoration:none;">
        Cancel
    </a>

</form>

@endsection