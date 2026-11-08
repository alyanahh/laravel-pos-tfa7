@extends('layouts.app')

@section('title', 'Customer Accounts | POS System')

@section('content')

<h2>Customer Accounts</h2>

<p>List of registered customers in the POS Management System.</p>

@if (session('success'))
    <div style="background:#dcfce7; color:#166534;
                padding:15px; border-radius:10px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('customers.create') }}"
   style="display:inline-block; background:#7e22ce; color:white;
          padding:12px 18px; border-radius:8px;
          text-decoration:none; margin-bottom:15px;">

    + Add New Customer

</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>

                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}"
                       style="background:#7e22ce; color:white;
                              padding:7px 12px; border-radius:6px;
                              text-decoration:none;">
                        Edit
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No customers found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<p>Total customers: {{ $customers->count() }}</p>

@endsection