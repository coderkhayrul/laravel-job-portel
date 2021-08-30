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
@endsection
<style>

</style>
