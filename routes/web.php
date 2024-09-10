<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\CustomAuth\CRegisterController;
use App\Http\Controllers\CustomAuth\CLoginController;
use App\Http\Controllers\CustomAuth\CDashboardController;


Route::get('/', [FormController::class, 'index']);
Route::get('/auth/login', [LoginController::class, "index"]);
Route::get('/auth/register', [RegisterController::class, "index"]);
Route::get("/dashboard", [DashboardController::class, "index"]);
Route::get("/custom_auth/dashboard", [CDashboardController::class, "index"]);
Route::get('/custom_auth/register', [CRegisterController::class, "index"]);
Route::get('/custom_auth/login', [CLoginController::class, "index"]);


Route::post("/auth/login", [LoginController::class, 'login'])->name("login");
Route::post("/auth/register", [RegisterController::class, 'register'])->name("register");
Route::post("/custom_auth/register", [CRegisterController::class, 'register'])->name("custom.register");
Route::post("/custom_auth/login", [CLoginController::class, 'login'])->name("custom.register");
Route::post("/", [FormController::class, 'store'])->name("store");