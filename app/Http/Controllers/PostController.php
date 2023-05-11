<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catagories = Catagory::all();
        $user = Auth()->user();
        return view('posts.create',compact('user','catagories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required',
            'catagory_id'=>'required',
            'photo'=>'required|mimes:png,jpg,jpeg,webp'
        ]);
        $newPost = $request->all();
        if($img = $request->file('photo')){
            $path = "img/";
            $ext = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($path,$ext);
            $newPost['photo'] = $ext;
        }
        $newPost['user_id'] = Auth::user()->id;
        Post::create($newPost);
        return redirect()->route('posts.index')->with('success',"create Post successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view("posts.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
