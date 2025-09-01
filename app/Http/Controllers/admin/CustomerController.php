<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\LogsActivity;

class CustomerController extends Controller
{
    use LogsActivity;
    public function index()
    {
        $customers = User::where('role', 'user')->get();

        $this->logActivity('View', 'Customers', 'Viewed all customers');

        return view('admin.customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        $this->logActivity('Open Form', 'Customers', 'Opened create customer form');

        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        // Logic to store new customer
        $customer = User::create($request->all());

        $this->logActivity('Create', 'Customers', "Created customer ID: {$customer->id}");

        return redirect()->route('admin.customers.index');
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', ['customer' => $customer]);
    }

    public function show($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.show', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        $customer->update($request->all());

        $this->logActivity('Update', 'Customers', "Updated customer ID: {$customer->id}");

        return redirect()->route('admin.customers.index');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        $this->logActivity('Delete', 'Customers', "Deleted customer ID: {$id}");

        return redirect()->route('admin.customers.index');
    }
}
