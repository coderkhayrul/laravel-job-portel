<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
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

    public function coverletter(Request $request)
    {
        $this->validate($request, ['cover_letter' => 'required']);

        $user_id = Auth::user()->id;
        $cover_letter = $request->file('cover_letter')->store('public/upload');

        Profile::where('user_id', $user_id)->update(
            [
                'cover_letter' => $cover_letter,
            ]
        );

        return back()->with('success', 'User Profile Cover Letter Updated');
    }

    public function resume(Request $request)
    {
        $this->validate($request, ['resume' => 'required']);

        $user_id = Auth::user()->id;
        $resume = $request->file('resume')->store('public/upload');

        Profile::where('user_id', $user_id)->update(
            [
                'resume' => $resume,
            ]
        );

        return back()->with('success', 'User Profile Resume Updated');
    }
}
