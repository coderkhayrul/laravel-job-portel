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
            <img src="{{  asset(Auth::user()->company->logo) ? asset(Auth::user()->company->logo) : asset('avatar/logo.png') }}" alt="company logo" width="100" style="width: 100%;">
            <br><br>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                @error('logo')
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
                <div class="card-header d-flex justify-content-between">
                    Update Company Information
                    <a class="btn btn-primary btn-sm" href="{{ url('/') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                value="{{ Auth::user()->company->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone Number"
                                value="{{ Auth::user()->company->phone }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" id="website" class="form-control  @error('website') is-invalid @enderror" placeholder="Website"
                                value="{{ Auth::user()->company->website }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" name="slogan" id="slogan" class="form-control  @error('slogan') is-invalid @enderror" placeholder="Slogan"
                                value="{{ Auth::user()->company->phone }}">
                            @error('slogan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"> {{ Auth::user()->company->description }}</textarea>
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
                    Company Information
                </div>
                <div class="card-body">
                    <p><strong>Company Name:</strong> {{ Auth::user()->company->cname }}</p>
                    <p><strong>Address:</strong> {{ Auth::user()->company->address }}</p>
                    <p><strong>Mobile Number:</strong> {{ Auth::user()->company->phone }}</p>
                    <p><strong>Website:</strong> {{ Auth::user()->company->website }}</p>
                    <p><strong>Slogan:</strong> {{ Auth::user()->company->slogan }}</p>
                    <p><strong>Description:</strong> {{ Auth::user()->company->description }}</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Cover Photo
                </div>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control @error('cover_photo') is-invalid @enderror" name="cover_photo">
                        @error('cover_photo')
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
