<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (auth()->check()) {
            return view('company.index');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);

        if(auth()->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $request->session()->regenerate();
            return redirect('/index')->with('success', 'Success to sign-in. Welcome back!'); 
        }

        else {
            return redirect('/')->with('fail', 'Fail to sign-in. Credentials does not match. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        auth()->logout();

        return redirect('/')->with('success', 'Success to log-out.');
    }
}
