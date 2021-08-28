@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/logo.png') }}" alt="" width="100">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Update Your Profile
                    <a class="btn btn-primary btn-sm"href="{{ url('/') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="address">Experience</label>
                        <textarea class="form-control" name="experience" id="experience" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    Details Of User
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
                    <button class="btn btn-success" type="submit">Update</button>
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
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
