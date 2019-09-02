@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add Post</a>
</div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                      <tr>
                            <td>{{ $post->title }}</td>
                      <td>
                          <a href="{{route('posts.edit',$post->id ) }}" class="btn btn-primary">Edit</a> 
                          <a href="javascript:void(0)" onclick="HandleDelete({{ $post->id}})" class="btn btn-danger">Delete</a>
                      </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="Deletepost" tabindex="-1" role="dialog" aria-labelledby="DeletepostLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form id="DeletepostForm" action="" method="POST">
                          @csrf
                          @method('DELETE')
                            <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="DeletepostLabel">Delete post</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p class="text-center text-strong">Are you sure you want to delete this post?</p>
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
                let form = document.getElementById('DeletepostForm');
                form.action = 'posts/'+id;
                 $('#Deletepost').modal('show');
            }else{
                $('#Deletepost').modal('hide');
            }
        }
    </script>
@endsection