@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="company-profile">
                <img src="{{ $company->cover_photo ? asset('upload/coverphoto/').'/'.$company->cover_photo : asset('cover/php_cover.jpg') }}" alt="Company Cover Image" style="width:100%;">
                <div class="company-description">
                    <img style="width:100px" src="{{ asset('avatar/logo.png') }}" alt="Company Logo">
                    {{ $company->description }}
                    <h1>{{ $company->cname }}</h1>
                    <p><strong>Slogan</strong> - {{ $company->slogan }} &nbsp;<strong>Address</strong> - {{ $company->address }} &nbsp; <strong>Phone</strong> - {{ $company->phone }} &nbsp; <strong>Website</strong> - {{ $company->website}}</p>
                </div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <th>Logo</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($company->jobs as $job)
                        <tr>
                            <td><img width="80" src="{{ asset('avatar/logo.png') }}" alt=""></td>
                            <td>Position: {{ $job->position }} <br> <i class="fas fa-business-time text-primary"></i> {{ $job->type }}</td>
                            <td><i class="fas fa-map-marker-alt text-primary"></i>&nbsp;Address: {{ $job->address }}</td>
                            <td><i class="fas fa-globe-asia text-primary"></i>&nbsp;Date: {{ $job->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-success btn-sm"href="{{ route('jobs.show',[$job->id,$job->slug]) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
