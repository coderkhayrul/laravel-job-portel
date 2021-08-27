@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary m-0 text-white d-flex justify-content-between">
                    {{Str::limit($job->title, 90)}}
                    <a href="{{ url('/') }}" class="btn btn-success btn-sm">Back</a>
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
                    <p>Company: {{ $job->company->cname }}</p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employee Type: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <br>
            @if (Auth::check() && Auth::user()->user_type === 'seeker')
            <a style="width:100%" href="" class="btn btn-success">Apply</a>
            @endif
        </div>
    </div>
</div>
@endsection
