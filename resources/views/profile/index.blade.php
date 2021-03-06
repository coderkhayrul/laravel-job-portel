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
        <div class="col-md-3">
            <img src="{{  asset('upload/avater').'/'.Auth::user()->profile->avatar ? asset('upload/avater').'/'.Auth::user()->profile->avatar : asset('avatar/logo.png')  }}" alt="" width="100" style="width: 100%;">
            <br><br>
            <form action="{{ route('profile.avater') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control @error('avater') is-invalid @enderror" name="avater">
                @error('avater')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <button class="btn btn-success float-right" type="submit">Update</button>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                value="{{ Auth::user()->profile->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control  @error('phone_number') is-invalid @enderror" placeholder="phone_number"
                                value="{{ Auth::user()->profile->phone_number }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Experience</label>
                            <textarea class="form-control" name="experience" id="experience" rows="3">{{ Auth::user()->profile->experience }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Bio</label>
                            <textarea class="form-control" name="bio" id="bio" rows="3"> {{ Auth::user()->profile->bio }}</textarea>
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
                    <p><strong>Phone Number</strong> : {{ Auth::user()->profile->phone_number }}</p>
                    <p><strong>Gender</strong> : {{ Auth::user()->profile->gender }}</p>
                    <p><strong>Experience</strong> : {{ Auth::user()->profile->experience }}</p>
                    <p><strong>Bio</strong> : {{ Auth::user()->profile->experience }}</p>
                    <p><strong>Member On</strong>  : {{ date('F d Y', strtotime(Auth::user()->profile->created_at)) }}</p>
                    @if (!empty(Auth::user()->profile->cover_letter))
                    <p><a target="_blank" href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                    @else
                    <p>Please Upload Cover Letter</p>
                    @endif
                    @if (!empty(Auth::user()->profile->resume))
                    <p><a target="_blank" href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                    @else
                    <p>Please Upload Resume</p>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Cover Letter
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.cover.letter') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter">
                        @error('cover_letter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Resume
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume">
                        @error('resume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
