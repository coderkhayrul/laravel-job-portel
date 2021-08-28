<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        return view('profile.index', compact('profile'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $old_profile = Profile::where('user_id', $user_id)->first();

        $profile = Profile::where('user_id', $user_id)->update([
            'address' => $request->address ? $request->address : $old_profile->address,
            'experience' => $request->experience ? $request->experience : $old_profile->experience,
            'bio' => $request->bio ? $request->bio : $old_profile->bio,
        ]);

        return back()->with('success', 'User Profile has been Updated');
    }
}
