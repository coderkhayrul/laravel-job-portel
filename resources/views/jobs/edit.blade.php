@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ Auth::user()->name }}</strong> {{ Session::get('success'); }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    Job Post Edit
                    <a href="{{ url('/') }}" class="btn btn-success btn-sm">Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('jobs.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{ $job->title }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Description"
                                class="form-control @error('description') is-invalid @enderror" rows="3">{{ $job->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="roles">Role</label>
                            <textarea id="roles" name="roles" placeholder="Roles"
                                class="form-control @error('roles') is-invalid @enderror" rows="3">{{ $job->roles }}</textarea>
                            @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control  @error('category') is-invalid @enderror">
                                <option value="" selected disabled >Select Category</option>
                                @foreach ($categories as $key => $category)
                                <option {{ $job->category->name === $category->name ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">Position</label>
                            <input value="{{ $job->position }}" type="text" class="form-control @error('position') is-invalid @enderror" placeholder="#Web Developer" name="position" id="position">
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" value="{{ $job->address }}" class="form-control  @error('address') is-invalid @enderror" placeholder="Address" name="address" id="address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                                <option value="" selected disabled>Select Type</option>
                                <option {{ 'fulltime' === $job->type ? 'selected' : '' }} value="fulltime">Full Time</option>
                                <option {{ 'parttime' === $job->type ? 'selected' : '' }} value="parttime">Part Time</option>
                                <option {{ 'casual' === $job->type ? 'selected' : '' }} value="casual">Casual</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                <option value="" selected disabled>Select Type</option>
                                <option {{ 1 === $job->status ? 'selected' : '' }} value="1">Live</option>
                                <option {{ 2 === $job->status ? 'selected' : '' }} value="0">Draft</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_date">Last Date</label>
                            <input type="date" value="{{ $job->last_date }}" name="last_date" id="last_date" class="form-control @error('last_date') is-invalid @enderror">
                            @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
