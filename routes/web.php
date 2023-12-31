<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


/**
 * post módosítás ✅
 * post törlés ✅
 * Seeder user, post, label ✅
 *
 * formázás bootstrappal ✅
 *
 * Címke tábla létrehozása ✅
 *      több a többhöz kapcsolattal a postokhoz ✅
 *
 *  Bejelentkezés és regisztráció ✅
 *      Login ✅
 *      Register✅
 *
 *
 *  címkézés select2-vel ✅
 *      createpost címkézőssé alakítása ✅
 *      editpost címkézőssé alakítása   ✅
 *
 *      createpost, editpost többcímkével ✅
 *
 *  nem létező postokat ne lehessen megnézni és szerkeszteni get linkkel ✅
 *
 *
 *  ❗❗❗ posztok szűrése címke alapján  ✅
 *  címke törlés,✅
 *  x posztonként legyen új oldal ✅
 *
 */

Route::get("/", [PostController::class, "list"])->name("home");


Route::get("/registration", [RegisterController::class, "regForm"])->middleware("guest");
Route::post("/registration", [RegisterController::class, "registration"])->middleware("guest");

Route::get("login", [LoginController::class, "loginForm"])->name("login")->middleware("guest");

Route::post("/login", [LoginController::class, "login"])->middleware("guest");

Route::post("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/new-post", [PostController::class, "newPost"])->middleware("auth");
Route::post("/new-post", [PostController::class, "createPost"])->middleware("auth");

Route::get("/posts/{post}", [PostController::class, "readPost"]);

Route::get("/edit-post/{post}", [PostController::class, "editPostForm"])->middleware("auth");
Route::post("/edit-post", [PostController::class, "editPost"])->middleware("auth");

Route::get("/delete-post/{post}", [PostController::class, "deletePost"])->middleware("auth");

Route::get("/filter-post", [PostController::class, "filterPost"]);

Route::get("/delete-label", [LabelController::class, "deleteLabelForm"])->middleware("auth");

Route::post("/delete-label", [labelController::class, "deleteLabel"])->middleware("auth");
