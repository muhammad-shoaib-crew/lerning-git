<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Middleware\ValidateJob;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

// Shorthand of above
Route::view('/', 'home');

Route::view('/about', 'about');

Route::view('/contact', 'contact');



// Route::get('/jobs', [JobController::class, 'index']);

// Or we can group all routs that uses one controller like this

Route::controller(JobController::class)->group(function (){

    Route::get('/jobs', 'index');
    
    Route::get('/jobs/create', 'create');

    Route::get('/jobs/{job}', 'show');

    Route::post('/jobs', 'store')->middleware(ValidateJob::class);

    Route::get('/jobs/{job}/edit', 'edit');

    Route::patch('/jobs/{job}', 'update')->middleware(ValidateJob::class);

    Route::delete('/jobs/{id}', 'destroy');
});

// We have a Route::resource that register all routes(index, create, show, store, edit, update, destroy) automatically

// Route::resource('/jobs', JobController::class)->middleware(ValidateJob::class)->only(['create', 'update']);


Route::get('/blogs', function(){
    // $blogs = Blog::all();   //Get all Blogs with Lazy loading, (for realationship and each relationship each query will run sepratley which leades to slowing down performance)
    // $blogs = Blog::with('author')->get(); //Get all Blogs with Eager Loading(everything, like realation in sigle optimized sql query)
    // $blogs = Blog::with('author')->paginate(5); //get all blogs but with pagination (with page numbers)
    $blogs = Blog::with('author')->simplePaginate(5); //get all blogs but with pagination (with page numbers)
    return view('blogs.index', [
        'blogs' => $blogs
    ]);
});
Route::get('/blogs/{id}', function ($id){
    $blog = Blog::find($id);
    if(!$blog){
        abort('404');
    }
    $author = $blog->author()->pluck('name')[0];
    return view('blogs.single', [
        'blog' => $blog,
        'author' => $author
    ]);
});




//Auth

Route::get('/register', [UserRegistrationController::class, 'create']);
Route::post('/register', [UserRegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);
