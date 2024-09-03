<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\TopicController; 

Route::get('/', function () {
    return view('welcome');
});

  //Public Routes
Route::get('index', [PublicController::class, 'index'])->name('articles.index');
Route::get('topicslisting', [PublicController::class, 'topicslisting'])->name('articles.topicslisting');
Route::get('topicsdetail', [PublicController::class, 'topicsdetail'])->name('articles.topicsdetail');
Route::get('testimonials', [PublicController::class, 'testimonials'])->name('articles.testimonials');
Route::get('contact', [PublicController::class, 'contact'])->name('articles.contact');
Route::get('404', [PublicController::class, 'page404'])->name('articles.404');


 //Admin Routes
Route::prefix('admin')->group(function () {  
    //Users Routes  
    Route::group([  
        'prefix' => 'users',  
    ], function () {  
        Route::get('', [UserController::class, 'index'])->name('users.index');  
        Route::get('create', [UserController::class, 'create'])->name('users.create');  
        Route::post('', [UserController::class, 'store'])->name('users.store');  
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');  
        Route::put('{id}', [UserController::class, 'update'])->name('users.update');  
    });  

    // Categories Routes  
    Route::group([  
        'prefix' => 'categories'  
    ], function () {  
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');  
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');  
        Route::post('', [CategoryController::class, 'store'])->name('categories.store');  
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');  
        Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update');  
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');    
    });  

     // Topics Routes  
     Route::group([  
        'prefix' => 'topics'  
    ], function () {  
        Route::get('', [TopicController::class, 'index'])->name('topics.index');  
        Route::get('create', [TopicController::class, 'create'])->name('topics.create');  
        Route::post('', [TopicController::class, 'store'])->name('topics.store'); 
        Route::get('topics/{id}', [TopicController::class, 'show'])->name('topics.show'); 
        Route::get('edit/{id}', [TopicController::class, 'edit'])->name('topics.edit');  
        Route::put('{id}', [TopicController::class, 'update'])->name('topics.update');  
        Route::delete('delete/{id}', [TopicController::class, 'destroy'])->name('topics.destroy');    
    }); 

    
    // Testimonials Routes  
    // Route::group([  
    //     'prefix' => 'testimonials'   
    // ], function () {  
    //     Route::get('', [TestimonialController::class, 'index'])->name('testimonials.index');  
    //     Route::get('{id}/show', [TestimonialController::class, 'show'])->withTrashed()->name('testimonials.show');  
    //     Route::get('create', [TestimonialController::class, 'create'])->name('testimonials.create');  
    //     Route::post('', [TestimonialController::class, 'store'])->name('testimonials.store');  
    //     Route::get('{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');  
    //     Route::put('{id}', [TestimonialController::class, 'update'])->name('testimonials.update');  
    //     Route::delete('{id}/delete', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');  
    //     Route::get('trashed', [TestimonialController::class, 'showDeleted'])->name('testimonials.showDeleted');  
    //     Route::patch('{id}', [TestimonialController::class, 'restore'])->name('testimonials.restore');  
    //     Route::delete('{id}/forcedelete', [TestimonialController::class, 'forcedelete'])->name('testimonials.forcedelete');  
    // });  
});  
