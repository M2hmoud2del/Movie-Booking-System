<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    use LogsActivity;

    public function index(Request $request)
    {
        $query = User::where('role', 'user');
        
        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        if ($request->sort) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name-desc':
                    $query->orderBy('name', 'desc');
                    break;
            }
        }

        $customers = $query->paginate(10)->appends($request->all());

        $this->logActivity('View', 'Customers', 'Viewed all customers');

        return view('admin.customers.index', compact('customers'));
    }




    public function create()
    {
        $this->logActivity('Open Form', 'Customers', 'Opened create customer form');

        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => [
                'nullable',
                'regex:/^(010|011|012|015)[0-9]{8}$/'
            ],
            'password' => 'required|string|min:6|confirmed',
        ], [
            'phone.regex' => 'You must enter a valid Egyptian phone number.',
        ]);

        // Create the user once and store it in a variable
        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        // Log the activity using the created customer variable
        $this->logActivity('Create', 'Customers', "Created customer ID: {$customer->id}");

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
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


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $customer->id,
            'phone' => [
                'nullable',
                'regex:/^(010|011|012|015)[0-9]{8}$/'
            ],
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'phone.regex' => 'You must enter a valid Egyptian phone number.',
        ]);


        $data = $request->only(['name', 'email', 'phone']);


        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }


        $customer->update($data);


        $this->logActivity('Update', 'Customers', "Updated customer ID: {$customer->id}");


        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        $this->logActivity('Delete', 'Customers', "Deleted customer ID: {$id}");

        return redirect()->route('admin.customers.index')->with('success', 'Customer Deleted successfully.');
    }
}
