@extends('layouts.app');
@section('content')

    <div class="card card-default">
        <div class="card-header">
            Create Category
        </div>
        <div class="card-body">
        <form action="{{ route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                <input id="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection