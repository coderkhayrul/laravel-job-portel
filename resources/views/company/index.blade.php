@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="company-profile">
                <img src="{{ asset('cover/php_cover.jpg') }}" alt="Company Cover Image" style="width:100%;">
                <div class="company-description">
                    <img style="width:100px" src="{{ asset('avatar/logo.png') }}" alt="Company Logo">
                    {{ $company->description }}
                    <h1>{{ $company->cname }}</h1>
                    <p><strong>Slogan</strong> - {{ $company->slogan }} &nbsp;<strong>Address</strong> - {{ $company->address }} &nbsp; <strong>Phone</strong> - {{ $company->phone }} &nbsp; <strong>Website</strong> - {{ $company->website}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
