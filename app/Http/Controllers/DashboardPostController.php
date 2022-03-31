<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post.index',[
            'posts' => Post::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create',[
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('images');
        }

        $validasi['slug'] = str($request['title'])->slug();
        $validasi['excerpt'] = str($request['content'])->limit(70,'....');

        Post::create($validasi);

        return redirect('/dashboard/posts')->with('success','Postingan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit',[
            'post' => $post,
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validasi['image'] = $request->file('image')->store('images');
        }

        $validasi['slug'] = str($request->title)->slug();
        $validasi['excerpt'] = str($request->content)->limit(70,'....');

        $post->update($validasi);

        return redirect('/dashboard/posts')->with('success','Postingan Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();

        return back()->with('success','Postingan Berhasil Ditambahkan');
    }
}
