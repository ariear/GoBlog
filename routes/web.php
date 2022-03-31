<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',[
        'posts' => Post::latest()->limit(8)->get(),
        'active' => 'home'
    ]);
});

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post',[
        'post' => $post,
        'active' => 'posts'
    ]);
});
Route::get('/contact', function () {
    return view('contact',[
        'active' => 'contact'
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'active' => 'about'
    ]);
});


Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);


Route::get('/dashboard', function () {
    return view('dashboard.homedashboard',[
        'post' => Post::all(),
        'category' => Category::all(),
        'user' => User::all(),
        'posts' => Post::latest()->limit(4)->get()
    ]);
})->middleware('admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');
Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('admin');
Route::resource('/dashboard/users', DashboardUserController::class);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
