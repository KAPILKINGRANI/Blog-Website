<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'author') {
            return view(abort(404));
        }
        $users = User::paginate(50);
        return view('admin-panel.users.index', compact('users'));
    }
    public function makeAdmin(User $user)
    {

        $user->role = 'admin';
        $user->save();
        return redirect(route('users.index'))->with('success', " $user->name Has Been Made Admin Successfully!");
    }
    public function revokeAdmin(User $user)
    {
        $user->role = 'author';
        $user->save();
        return redirect(route('users.index'))->with('success', "$user->name Has Been Revoked From Admin Role Successfully!");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
