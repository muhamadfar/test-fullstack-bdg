@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Find Catering</h2>
    <form method="GET" action="{{ url('/customer/catering') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter location">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">Select category</option>
                        <option value="Italian">Italian</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Indian">Indian</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($merchants as $merchant)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $merchant->logo) }}" class="card-img-top" alt="{{ $merchant->company_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $merchant->company_name }}</h5>
                    <p class="card-text">{{ $merchant->description }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $merchant->address }}</p>
                    <a href="{{ url('/customer/catering/' . $merchant->id) }}" class="btn btn-primary">View Menu</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection