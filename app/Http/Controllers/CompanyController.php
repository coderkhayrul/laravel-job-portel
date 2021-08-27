<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company)
    {
        // dd($company);
        return view('company.index', compact('company'));
    }
}
