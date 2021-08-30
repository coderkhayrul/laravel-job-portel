@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach ($applicants as $applicant)
                    <div class="card-header"><a style="text-decoration: none" href="{{ route('jobs.show',[$applicant->id,$applicant->slug]) }}">{{ $applicant->title }}</a></div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Bio</th>
                                <th>Experience</th>
                                <th>Resume</th>
                                <th>Cover Letter</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($applicant->users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profile->address }}</td>
                                        <td>{{ $user->profile->gender }}</td>
                                        <td>{{ $user->profile->bio }}</td>
                                        <td>{{ $user->profile->experience }}</td>
                                        <td><a class="btn btn-primary btn-sm" target="_blank" href="{{ Storage::url($user->profile->resume) }}">Download </a></td>
                                        <td><a class="btn btn-primary btn-sm" target="_blank" href="{{ Storage::url($user->profile->cover_letter) }}">Download</a></td>
                                        <td>
                                            <a target="_blank" href="#" class="btn btn-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
