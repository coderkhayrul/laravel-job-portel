@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-primary m-0 text-white">
                    {{Str::limit($job->title, 90)}}
                </div>

                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{ $job->description }}
                    </p>
                    <p>
                        <h3>Duties</h3>
                        {{ $job->roles }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">Short Info</div>

                <div class="card-body">
                    <p>Company: <a style="text-decoration: none" href="{{ route('company.index',[$job->company->id,$job->company->slug]) }}">{{ $job->company->cname }}</a></p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employee Type: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                    <p><strong>Last Date To Apply:</strong> {{ date('F d, Y', strtotime($job->last_date)) }}</p>
                </div>
            </div>
            <br>
            @if (Auth::check() && Auth::user()->user_type === 'seeker')
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success'); }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                @if (!$job->checkApplication())
                    <form action="{{ route('jobs.apply', $job->id) }}" method="post">
                        @csrf
                        <button class="btn btn-success" style="width:100%" type="submit">Apply</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
