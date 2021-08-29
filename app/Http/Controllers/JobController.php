<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'DESC')->get()->take(10);

        return view('welcome', compact('jobs'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('jobs.create', compact('categories'));
    }
}
