<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('ManajemenUser.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,kasir',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        toast()->success('Data berhasil ditambah');
        return redirect()->route('user.index');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,kasir',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        toast()->success('Data berhasil ditambah');
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast()->success('Data berhasil dihapus');
        return redirect()->route('user.index');
    }

    public function update_password(Request $request, User $user)
    {
        $request->validate(
            [
                'current_password' => ['required'],
                'new_password' => ['required', 'min:6', 'confirmed'],
            ],
            [],
        );

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        toast()->success('Passsword diubah');
        return back();
    }
}
