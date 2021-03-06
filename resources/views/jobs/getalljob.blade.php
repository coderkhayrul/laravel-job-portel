@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('jobs.all') }}" method="get">
            @csrf
            <div class="form-inline mb-2">
                <div class="fomr-group">
                    <label for="">Keyword&nbsp;</label>
                    <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
                </div>
                <div class="fomr-group">
                    <label for="">Employment Type</label>
                    <select name="type" class="form-control" id="type">
                        <option value="" selected disabled>Select Type</option>
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="casual">Casual</option>
                    </select>&nbsp;&nbsp;&nbsp;
                </div>
                @php
                    $categories = App\Models\Category::all();
                @endphp
                <div class="fomr-group">
                    <label for="">Category&nbsp;</label>
                    <select name="category_id" class="form-control  @error('category') is-invalid @enderror">
                        <option selected value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="fomr-group">
                    <label for="">Address&nbsp;</label>
                    <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
                </div>
                <div class="fomr-group">
                    <label for="">&nbsp;</label>
                    <button type="submit" class="btn btn-primary">Search</button>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </form>
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
        {{ $jobs->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
        {{-- {{ $jobs->links('pagination::bootstrap-4') }} --}}
    </div>
</div>
@endsection
