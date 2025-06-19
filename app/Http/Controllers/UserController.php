<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
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
        $id = decrypt($id);
        $userEdit = User::findOrFail($id);

        return view('admin.user.edit', compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $id = decrypt($id);

        $userUpdate = User::findOrFail($id);

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:1',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
            'password' => 'nullable|string|min:8|confirmed',
            'desc' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($validation->fails()) {
            return redirect()->route('users.edit', encrypt($id))
                ->with('userUpdateFailed', 'Failed to update user!')
                ->withErrors($validation)
                ->withInput();
        }

        if ($request->filled('password')) {
            $password = Hash::make($request->password);
        } else {
            $password = $userUpdate->password;
        }

        $cv = $userUpdate->cv;

        if ($request->hasFile('cv')) {
            if ($cv && Storage::disk('public')->exists($cv)) {
                Storage::disk('public')->delete($cv);
            }

            $cv = $request->file('cv')->store('cv', 'public');
        }

        // if ($userUpdate) {

        $makan = $userUpdate->update([
            'name' => $request->name,
            'password' => $password,
            'email' => $request->email,
            'cv' => $cv,
            'desc' => $request->desc,
        ]);

        return redirect()->route('users.index');
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
