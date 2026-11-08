<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display all customers
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    // Show Create Customer form
    public function create()
    {
        return view('customers.create');
    }

    // Save new customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $validated['phone'] = $validated['phone'] ?? '';

        Customer::create($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer added successfully!');
    }

    // Show Edit Customer form
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Update existing customer
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $validated['phone'] = $validated['phone'] ?? '';

        $customer->update($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully!');
    }
}