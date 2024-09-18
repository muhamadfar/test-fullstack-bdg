@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Menu</h2>
    <form method="POST" action="{{ url('/merchant/menus') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Menu</button>
    </form>
</div>
@endsection