<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


/**
 * post módosítás ✅
 * post törlés ✅
 * Seeder user, post, label ✅
 *
 * formázás bootstrappal ☑️
 *
 * Címke tábla létrehozása ✅
 *      több a többhöz kapcsolattal a postokhoz ❗❗❗
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
 *
 *  ❗❗❗ posztok szűrése címke alapján  ✅
 *  címke törlés, x posztonként legyen új oldal
 *
 */

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

Route::get("/filter-post", [PostController::class, "filterPost"]);

/**
 * Címkék törlése form
 */

//Route::get("/label-delete")

/**
 * címke törlése
 */

 //Route::post("label-delete/[label]")

//-----------------------TEST-----------------------------

