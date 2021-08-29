<?php

namespace App\Http\Controllers;

use App\Models\Company;

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
}
