<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function __construct()
    {
        Cache::put('page', 'user');
        $this->users = User::all();

        $this->data = [
            'users' => $this->users,
        ];
    }

    public function index()
    {
        return view('admin.user.index')->with($this->data);
    }

    public function create()
    {
        $data = ['operation' => 'create'];
        return view('admin.user.crud')->with($data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/user')->with('success', ('İstifadəçi uğurla əlavə edildi'));

    }

    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        $data = [
            'operation' => 'edit',
            'user' => $user,
        ];

        return view('admin.user.crud')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email, ' . $id]
        ]);

        $user = User::query()->findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
            $user->password = Hash::make($request->password);
        }
        try {
            $user->save();
            return redirect('admin/user')->with('success', ('İstifadəçidə uğurla dəyişiklik edildi'));
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return redirect('admin/user')->with('success',  ('İstifadəçi uğurla silindi'));
        } catch (Exception $e) {
            return redirect('admin/user')->with('error',  ('İstifadəçi silinə bilmədi') . $e->getMessage());
        }
    }

}
