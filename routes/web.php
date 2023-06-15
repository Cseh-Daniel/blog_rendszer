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
 *      több a többhöz kapcsolattal a postokhoz
 *
 *  Bejelentkezés és regisztráció ✅
 *      Login ✅
 *      Register✅
 *
 *
 *  címkézés select2-vel ☑️
 *      createpost címkézőssé alakítása ☑️ csak 1 címke
 *      editpost címkézőssé alakítása   ☑️ csak 1 címke
 *
 *  nem létező postokat ne lehessen megnézni és szerkeszteni get linkkel ✅
 *
 *  Ha az adatbázis nem fut azt is le kell kezelni
 *  https://flareapp.io/share/Lm8zwZV7
 */

//https://laracasts.com/series/laravel-8-from-scratch/episodes/8

Route::get("/", [PostController::class, "list"]);


Route::get("/registration",[RegisterController::class,"regForm"])->middleware("guest");
Route::post("/registration", [RegisterController::class, "registration"])->middleware("guest");

Route::get("login",[LoginController::class,"loginForm"])->name("login")->middleware("guest");

Route::post("/login", [LoginController::class, "login"])->middleware("guest");

Route::post("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/new-post", [PostController::class, "newPost"])->middleware("auth");
Route::post("/new-post", [PostController::class, "createPost"])->middleware("auth");

Route::get("/posts/{post}", [PostController::class, "readPost"]);

Route::get("/edit-post/{post}", [PostController::class, "editPostForm"])->middleware("auth");
Route::post("/edit-post/{post}", [PostController::class, "editPost"])->middleware("auth");

Route::get("/delete-post/{post}", [PostController::class, "deletePost"])->middleware("auth");


//-----------------------TEST-----------------------------

Route::get("/select2", function () {

    return view("select2");
});

Route::post("/tags", [PostController::class, "tagging"]);
