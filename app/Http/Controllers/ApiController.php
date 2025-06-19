<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function postProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$request->hasFile('image')) {
            return response()->json(['message' => 'No file uploaded'], 400);
        }

        $path = $request->file('image')->store('profileImg', 'public');

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->update([
            'image' => $path
        ]);

        return response()->json(['message' => 'Profile updated sucessfully!']);
    }

    public function deleteProfileImage()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if ($user && $user->image) {
            Storage::delete('public/' . $user->image);

            $user->image = null;
            $user->save();
            return response()->json(['message' => 'Profile image deleted sucessfully!']);
        }

        return response()->json(['message' => 'No image found!'], 404);
    }
}
