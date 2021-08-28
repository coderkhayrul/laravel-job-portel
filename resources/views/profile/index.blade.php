@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{ Auth::user()->name }}</strong> {{ Session::get('success'); }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/logo.png') }}" alt="" width="100">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Update Your Profile
                    <a class="btn btn-primary btn-sm" href="{{ url('/') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address"
                                value="{{ $profile->address}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Experience</label>
                            <textarea class="form-control" name="experience" id="experience" rows="3">{{ $profile->experience}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Bio</label>
                            <textarea class="form-control" name="bio" id="bio" rows="3"> {{ $profile->bio}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    <p><strong>Name</strong> : {{ Auth::user()->name }}</p>
                    <p><strong>Email</strong> : {{ Auth::user()->email }}</p>
                    <p><strong>Address</strong> : {{ Auth::user()->profile->address }}</p>
                    <p><strong>Gender</strong> : {{ Auth::user()->profile->gender }}</p>
                    <p><strong>Experience</strong> : {{ Auth::user()->profile->experience }}</p>
                    <p><strong>Bio</strong> : {{ Auth::user()->profile->experience }}</p>
                    <p><strong>Member On</strong>  : {{ Auth::user()->profile->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Cover Letter
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Resume
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
