@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{ route('categories.create') }}" class="btn btn-success mb-2">Add Category</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                      <tr>
                            <td>{{ $category->name }}</td>
                      <td>
                          <a href="{{route('categories.edit',$category->id ) }}" class="btn btn-primary">Edit</a> 
                          <a href="javascript:void(0)" onclick="HandleDelete({{ $category->id}})" class="btn btn-danger">Delete</a>
                      </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="DeleteCategory" tabindex="-1" role="dialog" aria-labelledby="DeleteCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form id="DeleteCategoryForm" action="" method="POST">
                          @csrf
                          @method('DELETE')
                            <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="DeleteCategoryLabel">Delete Category</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p class="text-center text-strong">Are you sure you want to delete this Category?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                  </div>
                      </form>
                    </div>
                  </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const HandleDelete = (id) => {
            if(id){
                let form = document.getElementById('DeleteCategoryForm');
                form.action = 'categories/'+id;
                 $('#DeleteCategory').modal('show');
            }else{
                $('#DeleteCategory').modal('hide');
            }
        }
    </script>
@endsection