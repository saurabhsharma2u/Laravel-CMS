@extends('layouts.app');
@section('content')
<div class="d-flex justify-content-end">

</div>
    <div class="card card-default">
        <div class="card-header">
            Create Category
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection