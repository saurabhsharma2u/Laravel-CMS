@extends('layouts.app');
@section('content')

    <div class="card card-default">
        <div class="card-header">
{{ isset($category)?'Edit Category':'Create Category'}}
            
        </div>
        <div class="card-body">
        <form action="{{ isset($category)? route('categories.update',$category->id):route('categories.store') }}" method="POST">
                
            @csrf

                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                <input id="name" value="{{ isset($category)?$category->name:old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ isset($category)?'Update Category':'Add Category'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection