@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ $job->title }}</div>

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
            <a href="" class="btn btn-success">Apply</a>
        </div>
    </div>
</div>
@endsection
