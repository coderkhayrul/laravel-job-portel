@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Of The Job</div>

                <div class="card-body">
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
                                <td>
                                    <img width="80"
                                        src="{{  !empty(asset('upload/logo') .'/'. Auth::user()->company->logo) ? asset('upload/logo') .'/'. Auth::user()->company->logo : asset('avatar/logo.png') }}"
                                        alt="company logo">
                                </td>
                                <td>Position: {{ $job->position }} <br> <i
                                        class="fas fa-business-time text-primary"></i> {{ $job->type }}</td>
                                <td><i class="fas fa-map-marker-alt text-primary"></i>&nbsp;Address: {{ $job->address }}
                                </td>
                                <td><i class="fas fa-globe-asia text-primary"></i>&nbsp;Date:
                                    {{ $job->created_at->diffForHumans() }}</td>
                                <td class="d-flex justify-content-between">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('jobs.show',[$job->id,$job->slug]) }}">View</a>
                                    <a class="btn btn-primary btn-sm"
                                    href="{{ route('jobs.show',[$job->id,$job->slug]) }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
