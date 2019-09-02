<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $Image = $request->image->store('posts');
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at'=>$request->published_at,
            'image'=>$Image
        ]);
        session()->flash('success','post Created Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, Post $post)
    {   
        
        if($request->image)
        {
            $Image = $request->image->store('posts');
            $post->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>$request->content,
                'published_at'=>$request->published_at,
                'image'=>$Image
            ]);
        }else {
            $post->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>$request->content,
                'published_at'=>$request->published_at,
                
            ]);
        }
       
        session()->flash('success','post Updated Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if ($post->trashed()) {
            $post->forceDelete();
        }else{
            $post->delete();
        }
       
        session()->flash('success','post Deleted Successfully');
        return redirect(route('posts.index'));
    }
    /**
     * Show the trashed posts
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        return view('posts.index')->withPosts(Post::onlyTrashed()->get());
    }
}
