<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer', ['except' => ['index']]);
    }

    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $company = Company::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'slogan' => $request->slogan,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Company Profile updated successfully');
    }

    public function coverPhoto(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        $user_id = Auth::user()->id;
        if (Auth::user()->company->cover_photo) {
            unlink('upload/coverphoto/' . Auth::user()->company->cover_photo);
        }
        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('upload/coverphoto/', $fileName);
            Company::where('user_id', $user_id)->update(['cover_photo' => $fileName]);

            return back()->with('success', 'Company Cover Photo Updated Successfully');
        }
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);

        $user_id = Auth::user()->id;
        if (Auth::user()->company->logo) {
            unlink('upload/logo/' . Auth::user()->company->logo);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('upload/logo/', $fileName);
            Company::where('user_id', $user_id)->update(['logo' => $fileName]);

            return back()->with('success', 'Company Logo Updated Successfully');
        }
    }
}
