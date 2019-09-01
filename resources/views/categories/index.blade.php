@extends('layouts.app');
@section('content')
<div class="d-flex justify-content-end">
<a href="{{ route(categories.create)}}" class="btn btn-success mb-2">Add Category</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            
        </div>
    </div>
@endsection