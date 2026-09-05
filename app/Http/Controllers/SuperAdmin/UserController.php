<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return view('superadmin.users._table-users', compact('users'))->render();
        }

        return view('superadmin.users.user-page', compact('users'));
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function store(Request $request)
    {
        $allowedRoles = auth()->user()->role === 'owner' ? ['pelanggan', 'admin', 'owner'] : ['pelanggan', 'admin'];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', Rule::in($allowedRoles)],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        if (auth()->user()->role === 'admin' && $user->role === 'owner') {
            return redirect()->route('admin.users.index')->with('error', 'Admin tidak memiliki hak akses untuk mengedit akun Owner.');
        }

        return view('superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role === 'admin' && $user->role === 'owner') {
            return redirect()->route('admin.users.index')->with('error', 'Admin tidak memiliki hak akses untuk mengedit akun Owner.');
        }

        $allowedRoles = auth()->user()->role === 'owner' ? ['pelanggan', 'admin', 'owner'] : ['pelanggan', 'admin'];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in($allowedRoles)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $data = $request->only('name', 'username', 'email', 'role');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if (auth()->user()->role === 'admin' && $user->role === 'owner') {
            return back()->with('error', 'Admin tidak memiliki hak akses untuk menghapus akun Owner.');
        }

        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
