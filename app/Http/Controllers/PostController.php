<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::latest()->paginate(12);
        $title = 'All Post ';

        if ($request->category) {
            $category = Category::select('id')->where('slug', $request->category)->get();
            $posts = Post::where('category_id', $category[0]->id)->latest()->paginate(12);
            $title .= 'By ' . $request->category;
        }

        if ($request->category && $request->search) {
            $postscategory = Post::where('category_id' , $category[0]->id);
            $posts = $postscategory->where('title', 'like' , '%' . $request->search . '%')->latest()->get();
        } else if ($request->search) {
            $posts = Post::where('title','like', '%' . $request->search . '%')->latest()->paginate(12);
        }

        return view('posts',[
            'title' => $title,
            'posts' => $posts,
            'active' => 'posts'
        ]);
    }
}
