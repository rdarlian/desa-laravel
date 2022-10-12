<?php

use App\Models\Post;
use App\Models\Galery;
use App\Models\Viewer;
use App\Models\Category;
use App\Models\Pelayanan;
use App\Models\DownloadModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PendudukController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SyaratSuratController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LayananMandiriController;
use App\Http\Controllers\PerangkatController;
use App\Models\Perangkat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Viewer $view) {
    $view->incrementReadCount();
    return view('home',[
        "title" => "Home",
        "active" => 'home',
        "pengunjung" => $view->count(),
        "post" => Post::latest()->take(6)->get()
    ]);
});
Route::get('/stats', function () {
    return view('statistik.stats',[
        "title" => "Home",
        "active" => 'home'
    ]);
});
Route::get('/perangkat', function () {
    return view('perangkatdesa',[
        "title" => "Perangkat Desa",
        "active" => 'perangkat'
    ]);
});
Route::get('/download', function () {
    return view('download', [
        "title" => 'Download',
        "active" => 'download',
        "download" => DownloadModel::all()
    ]);
});
Route::get('/blogs', [PostController::class, 'index']);
Route::get('blogs/{post:slug}', [PostController::class, 'show']);
Route::get('/profil', [PostController::class, 'profil']);


Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category)
// {
//     return view('posts',[
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category','author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts',[
//         'title' => "Post by Author : $author->name",
//         'posts' => $author->posts->load('category','author'),

//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard/register', [RegisterController::class, 'create'])->middleware('admin');
Route::post('/dashboard/register', [RegisterController::class, 'store']);
Route::get('/dashboard/user/{user}/edit', [RegisterController::class, 'edit']);
Route::get('/dashboard/user', [RegisterController::class, 'index']);

// Route::get('/dashboard/download', [DownloadController::class, 'index']);
Route::get('/dashboard/download/upload', [DownloadController::class, 'create']);
Route::get('/downloadfile/{downloadmodel:id}', [DownloadController::class, 'download']);
// Route::delete('/dashboard/download/{downloadmodel:id}', [DownloadController::class, 'destroy']);
// Route::put('/dashboard/download/{id}/edit', [DownloadController::class, 'update']);
// Route::get('blogs/{post:slug}', [PostController::class, 'show']);

Route::resource('/dashboard/download', DownloadController::class)->except('show')->middleware('auth');
Route::get('/dashboard/view/{id}', [DownloadController::class, 'view']);
// Route::post('/dashboard/upload', [DownloadController::class, 'upload']);


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

//kategori
Route::get('/dashboard/categories/create', [AdminCategoryController::class,'create'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

//penduduk
Route::resource('/dashboard/penduduk', PendudukController::class)->except('show');
Route::get('/dashboard/penduduk/create', [PendudukController::class,'create']);

//Pelayanan Controller
Route::resource('/dashboard/pelayanan', PelayananController::class)->middleware('admin');
route::get('/pelayanan/{pelayanan:nama_pelayanan}', [PelayananController::class, 'tampil']);

//Layanan Controller
Route::resource('/dashboard/layanan', LayananController::class)->middleware('admin');
// Syarat dokumen
Route::resource('/dashboard/syaratsurat', SyaratSuratController::class)->middleware('admin');

Route::resource('/dashboard/suratmasuk', SuratMasukController::class)->middleware('admin');
Route::put('dashboard/{item}/approve', [SuratMasukController::class, 'verified_surat'])->middleware('admin');

Route::resource('/dashboard/layananmandiri', LayananMandiriController::class);


// Galery Controller
Route::resource('/dashboard/galery', GaleryController::class)->middleware('auth');
Route::get('/galery', function () {
    return view('galery',[
        "title" => "Galery",
        "active" => 'galery',
        "galeries" => Galery::paginate(7)
    ]);
});

//perangkat controller
Route::resource('/dashboard/perangkat', PerangkatController::class)->middleware('auth');
Route::get('/perangkat', function () {
    return view('perangkat',[
        "title" => "Perangkat",
        "active" => 'perangkat',
        "perangkat" => Perangkat::all()
    ]);
});
