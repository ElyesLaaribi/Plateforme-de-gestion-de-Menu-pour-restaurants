<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;


// home routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::match(["get", "post"], "/login", "login")->name("login");
    Route::match(["get", "post"], "/signup", "signup")->name("signup");
    Route::get("/logout", "logout")->name("logout");
});

// feedback routes
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.submit');
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.delete');
Route::get('/feedback/{id}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit')->middleware('admin');
Route::put('/feedback/{id}', [FeedbackController::class, 'update'])->name('feedback.update')->middleware('admin');

// admin routes

Route::prefix("admin")->group(function () {

    Route::match(["get", "post"], "/admin/login", [AdminController::class, "login"])->name("adminlogin");
    Route::get("/admin/logout", [AdminController::class, "logout"])->name("adminLogout");


    Route::middleware("auth:admin")->group(function () {
        Route::get("/", [AdminController::class, "dashboard"])->name("admin.dashboard");

        Route::controller(CategoryController::class)->group(function () {
            Route::prefix("category")->group(function () {
                Route::match(["get", "post"], "/", "manageCategory")->name("admin.category");
                Route::post("/{id}/update", "updateCategory")->name("admin.category.update");
                Route::delete("/{id}/delete", "deleteCategory")->name("admin.category.delete");
            });
        });

        Route::controller(ProductController::class)->group(function () {
            Route::prefix("product")->group(function () {
                Route::get("/", "index")->name("admin.product.index");
                Route::get("/create", "insert")->name("admin.product.insert");
                Route::post("/create", "store")->name("admin.product.store");
                Route::get("/edit/{id}", "edit")->name("admin.product.edit");
                Route::post("/edit/{id}", "update")->name("admin.product.update");
                Route::delete("/delete/{id}", "removeProduct")->name("admin.product.remove");
            });
        });
    });
});