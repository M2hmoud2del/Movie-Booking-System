<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\LogsActivity;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use LogsActivity;

    public function index(Request $request)
    {
        $query = User::where('role', 'admin');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $admins = $query->paginate(10);
        $this->logActivity('View', 'Admins', 'Viewed all admins');
        return view('admin.admins.index', compact('admins'));
    }



    public function create()
    {
        $this->logActivity('Open Form', 'Admins', 'Opened create admin form');

        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:11',
            'password' => 'required|string|min:6',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        $this->logActivity('Create', 'Admins', "Created admin ID: {$admin->id}");

        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admins.edit', ['admin' => $admin]);
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admins.show', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {

        $admin = User::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $admin->id,

            'password' => 'nullable|string|min:6',
        ]);


        $data = $request->only(['name', 'email', 'phone']);


        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }


        $admin->update($data);


        $this->logActivity('Update', 'Admins', "Updated admin ID: {$admin->id}");


        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        $this->logActivity('Delete', 'Admins', "Deleted admin ID: {$id}");

        return redirect()->route('admin.admins.index');
    }
}
