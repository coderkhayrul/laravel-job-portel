<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('seeker');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'bio' => 'required| min:20',
            'experience' => 'required| min:20',
            'phone_number' => 'required| min:10|numeric',
            // 'phone_number' => 'required|regex:/(01)[0-9]{9}/|max:11'
        ]);

        $user_id = Auth::user()->id;
        $old_profile = Profile::where('user_id', $user_id)->first();

        $profile = Profile::where('user_id', $user_id)->update([
            'address' => $request->address ? $request->address : $old_profile->address,
            'phone_number' => $request->phone_number ? $request->phone_number : $old_profile->phone_number,
            'experience' => $request->experience ? $request->experience : $old_profile->experience,
            'bio' => $request->bio ? $request->bio : $old_profile->bio,
        ]);

        return back()->with('success', 'User Profile has been Updated');
    }

    public function coverletter(Request $request)
    {
        $this->validate($request, ['cover_letter' => 'required|mimes:pdf,doc,docx,|max:20000']);

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
        $this->validate($request, ['resume' => 'required|mimes:pdf,doc,docx,|max:20000']);

        $user_id = Auth::user()->id;
        $resume = $request->file('resume')->store('public/upload');

        Profile::where('user_id', $user_id)->update(
            [
                'resume' => $resume,
            ]
        );

        return back()->with('success', 'User Profile Resume Updated');
    }

    // AVATER FUNCTION
    public function avater(Request $request)
    {
        $this->validate($request, ['avater' => 'required|mimes:png,jpg,jpeg,|max:50000']);

        $user_id = Auth::user()->id;
        if (File::exists(public_path('upload/avater/', Auth::user()->profile->avatar))) {
            unlink('upload/avater/' . Auth::user()->profile->avatar);
        }

        if ($request->hasFile('avater')) {
            $file = $request->file('avater');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('upload/avater/', $fileName);
        }
        Profile::where('user_id', $user_id)->update(
            [
                'avatar' => $fileName,
            ]
        );

        return back()->with('success', 'User Profile Image Updated');
    }
}
