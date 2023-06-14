<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


//use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/home', function () {
    return view('welcome');
});
*/

/**
 * post módosítás ✅
 * post törlés ✅
 * Seeder user, post, label ✅
 *
 * formázás bootstrappal
 *
 * Címke tábla létrehozása ✅
 * ez több a többhöz kapcsolattal a postokhoz
 *
 * címkézés select2-vel 👀
 *  createpost címkézőssé alakítása
 *  editpost címkézőssé alakítása
 *
 */

//https://laracasts.com/series/laravel-8-from-scratch/episodes/8

Route::get("/", [PostController::class, "list"]);


Route::get("login", function () {
    return view('login');
})->middleware("guest");

Route::post("/login", [LoginController::class, "login"])->name("login")->middleware("guest");


Route::post("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/registration", function () {
    return redirect("/");
})->middleware("guest");

Route::post("/registration", [RegisterController::class, "registration"])->middleware("guest");


Route::get("/new-post",[PostController::class,"newPost"])->middleware("auth");

Route::post("/new-post", [PostController::class, "createPost"])->middleware("auth");

Route::get("/posts/{post}", [PostController::class, "readPost"]);

Route::get("/edit-post-form/{post}", [PostController::class,"editPostForm"])->middleware("auth");
Route::post("/edit-post/{post}",[PostController::class,"editPost"]) -> middleware("auth");

Route::get("/delete-post/{post}",[PostController::class,"deletePost"])-> middleware("auth");


//-----------------------TEST-----------------------------

Route::get("/select2",function(){

return view("select2");

});

Route::post("/tags",[PostController::class,"tagging"]);
