<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware('employer', ['except' => ['index', 'show', 'apply', 'getalljob']]);
    }

    public function index()
    {
        $jobs = Job::orderBy('id', 'DESC')->limit(5)->where('status', 1)->get();
        $companies = Company::get()->random(10);

        return view('welcome', compact('jobs', 'companies'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('jobs.create', compact('categories'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function store(JobPostRequest $request)
    {
        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->company_id = Auth::user()->company->id;
        $job->category_id = $request->category_id;
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

    public function editjob($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function update(JobPostRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('success', 'Job updated successfully');
    }

    public function apply($id)
    {
        $jobId = Job::findOrFail($id);
        $jobId->users()->attach(Auth::user()->id);

        return redirect()->back()->with('success', 'Application Sent successfully');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', Auth::user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function getalljob(Request $request)
    {
        $keyword = $request->title;
        $type = $request->type;
        $category_id = $request->category_id;
        $address = $request->address;

        if ($keyword || $type || $category_id || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orwhere('type', $type)
                ->orwhere('category_id', $category_id)
                ->orwhere('address', $address)
                ->paginate(5);

            return view('jobs.getalljob', compact('jobs'));
        } else {

            $jobs = Job::orderBy('id', 'DESC')->paginate(5);
            return view('jobs.getalljob', compact('jobs'));
        }
    }
}
