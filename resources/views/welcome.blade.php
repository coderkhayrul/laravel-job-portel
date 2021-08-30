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
                        {{ $job->type }}</td>
                    <td><i class="fas fa-map-marker-alt text-primary"></i>&nbsp;Address: {{ $job->address }}</td>
                    <td><i class="fas fa-globe-asia text-primary"></i>&nbsp;Date:
                        {{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('jobs.show',[$job->id,$job->slug]) }}">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <button style="margin-left: 50%" class="btn btn-success btn-lg text-center" style="width: 100" type="submit">Browse All
            Jobs</button>
    </div>
    <br>
    <h1>Featured Companies</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>

</style>
