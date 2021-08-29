<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
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
}
