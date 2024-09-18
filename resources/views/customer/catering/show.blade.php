@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $merchant->company_name }}</h2>
    <p>{{ $merchant->description }}</p>
    <p><strong>Location:</strong> {{ $merchant->address }}</p>

    <h3>Menu</h3>
    <form method="POST" action="{{ route('order.store') }}" class="order-form">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $menu->photo) }}" class="card-img-top" alt="{{ $menu->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $menu->price }}</p>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="delivery_date" class="form-label">Delivery Date</label>
                            <input type="date" name="delivery_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Order Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </form>
</div>
@endsection