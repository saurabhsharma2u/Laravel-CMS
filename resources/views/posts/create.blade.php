@extends('layouts.app');
@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post)?'Edit post':'Create post'}}
        </div>
        <div class="card-body">
        <form action="{{ isset($post)? route('posts.update',$post->id):route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                <input id="title" value="{{ isset($post)?$post->title:old('title')}}" class="form-control @error('title') is-invalid @enderror" type="text" name="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ isset($post)?$post->description:old('description')}}</textarea>
                     @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{ isset($post)?$post->content:old('content')}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                        <label for="published_at">Published At</label>
                    <input id="published_at" value="{{ isset($post)?$post->published_at:old('published_at')}}" class="form-control @error('published_at') is-invalid @enderror" type="text" name="published_at">
                        @error('published_at')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="form-group">
                        <label for="published_at">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ isset($post)?'Update post':'Add post'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection