@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <h1 class="">Recent Jobs</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <th>Logo</th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr>
                    <td><img width="80" src="{{ asset('avatar/logo.png') }}" alt=""></td>
                    <td>Position: {{ $job->position }} <br> <i class="fas fa-business-time text-primary"></i>
                        {{ $job->type }}
                    </td>
                    <td><i class="fas fa-map-marker-alt text-primary"></i>&nbsp;Address: {{ $job->address }}</td>
                    <td><i class="fas fa-globe-asia text-primary"></i>&nbsp;Date:
                        {{ $job->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('jobs.show',[$job->id,$job->slug]) }}">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('jobs.all') }}" class="btn btn-success btn-lg" style="margin-left: 47%;">Browse All Jobs</a>
    </div>
    <br>
    <h1>Featured Companies</h1>
    <div class="container">
        <div class="row">
            @foreach ($companies as $company)
            <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                    <img width="150px" src="{{ asset('avatar/logo.png') }}" alt="company logo">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $company->cname }}</strong></h5>
                        <p class="card-text">{{Str::limit($company->description, 100)}}</p>
                        <a href="{{ route('company.index',[$company->id,$company->slug]) }}" class="btn btn-primary">Visit Company</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<style>

</style>