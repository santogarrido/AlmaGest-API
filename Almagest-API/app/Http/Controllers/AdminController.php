<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::where('email_confirmed', 1)
        ->where('deleted', 0)
        ->get();
        return view('admin.index', compact('users'));
    }

    public function activate($id)
    {
        $user = \App\Models\User::findOrFail($id);

        if ($user->email_confirmed == 1) {
            $user->activated = 1;
            $user->save();
        }

        return redirect()->back()->with('success', 'User activated.');
    }

    public function desactivate($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->activated = 0;
        $user->save();

        return redirect()->back()->with('success', 'User desactivated.');
    }

    public function delete($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->deleted = 1;
        $user->save();

        return redirect()->back()->with('success', 'User deletetion was successful.');
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
        $user = \App\Models\User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:15',
            'secondname' => 'nullable|string|max:50',
            'company_id'
        ]);

        $user->firstname = $request->firstname;
        $user->secondname = $request->secondname;
        $user->company_id = $request->company_id;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
