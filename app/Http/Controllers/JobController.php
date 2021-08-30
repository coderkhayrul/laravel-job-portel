<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function store(JobPostRequest $request)
    {
        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->company_id = Auth::user()->company->id;
        $job->category_id = $request->category;
        $job->title = $request->title;
        $job->slug = Str::slug($request->title);
        $job->description = $request->description;
        $job->roles = $request->roles;
        $job->position = $request->position;
        $job->address = $request->address;
        $job->type = $request->type;
        $job->status = $request->status;
        $job->last_date = $request->last_date;
        $job->save();

        return redirect()->back()->with('success', 'Job Post Create Successfully');
    }

    public function myjob()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->get();

        return view('jobs.myjob', compact('jobs'));
    }
}
