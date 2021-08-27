@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <table class="table table-hover">
            <thead>
                <th>Logo</th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @for ($i=0; $i<10; $i++)
                    <tr>
                        <td><img width="80" src="{{ asset('avatar/logo.png') }}" alt=""></td>
                        <td>Position: Web Developer</td>
                        <td><i class="fas fa-map-marker"></i> Address: Melbourne, Australia</td>
                        <td>Date: 2021-08-27</td>
                        <td>
                            <button class="btn btn-success btn-sm">Apply</button>
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>
    </div>
</div>
@endsection
