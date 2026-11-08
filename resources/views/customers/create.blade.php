@extends('layouts.app')

@section('title', 'Create Customer | POS System')

@section('content')

<h2>Create Customer</h2>

<p>Enter the customer's information below.</p>

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

<form action="{{ route('customers.store') }}" method="POST">

    @csrf

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
        <label><strong>Email Address *</strong></label>

        <input
            type="text"
            name="email"
            value="{{ old('email') }}"
            placeholder="example@email.com"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <div style="margin-bottom:22px;">
        <label><strong>Phone Number</strong></label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
            placeholder="Enter phone number"
            style="width:100%; padding:12px; margin-top:8px;
                   border:1px solid #d8b4fe; border-radius:8px;"
        >
    </div>

    <button
        type="submit"
        style="background:#7e22ce; color:white; border:none;
               padding:12px 22px; border-radius:8px; cursor:pointer;"
    >
        Save Customer
    </button>

    <a
        href="{{ route('customers.index') }}"
        style="display:inline-block; margin-left:10px;
               color:#6d28d9; text-decoration:none;"
    >
        Cancel
    </a>

</form>

@endsection