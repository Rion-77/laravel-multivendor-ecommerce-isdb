<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Nullable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::with('role')->orderBy('id', 'desc')->paginate(15);
        // dd($users->first());
        // dd($users->first()->role->name);
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function roleIndex($role_id = null)
    {
        
        $roles = Role::all();

        if($role_id) {
            $users = User::with('role')->where('role_id', $role_id)->orderBy('id', 'desc')->paginate(15);
        } else {
            $users = User::with('role')->orderBy('id', 'desc')->paginate(15);
        }
        
        return view('admin.users.index', compact('users', 'roles', 'role_id'));
        // return redirect()->route('admin.users.index', compact('users', 'roles', 'role_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'name' => 'required|min:3|max:100',
                'role_id' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|phone|unique:users,phone',
                'password' => 'required|min:3|max:15',
                'password_confirmation' => 'required|same:password',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048'
            ],
            [
                'phone.phone' => 'The phone number is invalid.',
                'phone.required' => 'We need your phone number to proceed.',
            ]
        );
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->hasFile('profile_image')) {
            $user->addMediaFromRequest('profile_image')
                ->toMediaCollection('profile_image');
        }

        return redirect()->route('admin.users.index')->with('success', "User added succesfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'roles' => Role::all(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //    dd($request);
        $request->validate(
            [
                'name' => 'required|min:3|max:100',
                'role_id' => 'required',
                'email' => "required|email|unique:users,email,$id",
                'phone' => "required|phone|unique:users,phone,$id",
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048'
            ],
            [
                'phone.phone' => 'The phone number is invalid.',
                'phone.required' => 'We need your phone number to proceed.',
            ]
        );
        // dd($request);
        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        if ($request->hasFile('profile_image')) {
            $user->addMediaFromRequest('profile_image')
                ->toMediaCollection('profile_image');
        }

        return redirect()->route('admin.users.index')->with('success', "User Edited succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', "User deleted succesfully");
    }
}
