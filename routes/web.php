<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\TopicController; 
use App\Http\Controllers\admin\TestimonialController; 
use App\Http\Controllers\Admin\ContactController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

 
// Route::post('/register', [RegisterController::class, 'register']);


//login&logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');  
Route::post('login', [LoginController::class, 'login']);  
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


  //Public Routes
Route::get('index', [PublicController::class, 'index'])->name('articles.index');
Route::get('topicslisting', [PublicController::class, 'topicslisting'])->name('articles.topicslisting');
Route::get('topicsdetail', [PublicController::class, 'topicsdetail'])->name('articles.topicsdetail');
Route::get('testimonials', [PublicController::class, 'testimonials'])->name('articles.testimonials');
Route::get('contact', [ContactController::class, 'contact'])->name('articles.contact');
Route::get('404', [PublicController::class, 'page404'])->name('articles.404');


 //Admin Routes
Route::prefix('admin')->middleware(['verified'])->group(function () {  
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
        Route::get('topic/{id}', [TopicController::class, 'show'])->name('topics.show'); 
        Route::get('edit/{id}', [TopicController::class, 'edit'])->name('topics.edit');  
        Route::put('{id}', [TopicController::class, 'update'])->name('topics.update');  
        Route::delete('delete/{id}', [TopicController::class, 'destroy'])->name('topics.destroy');    
    }); 

    
    // Testimonials Routes  
    Route::group([  
        'prefix' => 'testimonials'   
    ], function () {  
        Route::get('', [TestimonialController::class, 'index'])->name('testimonials.index');  
        Route::get('{id}/show', [TestimonialController::class, 'show'])->name('testimonials.show');  
        Route::get('create', [TestimonialController::class, 'create'])->name('testimonials.create');  
        Route::post('', [TestimonialController::class, 'store'])->name('testimonials.store');  
        Route::get('{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');  
        Route::put('{id}', [TestimonialController::class, 'update'])->name('testimonials.update');  
        Route::delete('{id}/delete', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');  
    });  


    // contacts Routes  
    Route::group([  
        'prefix' => 'contacts'   
    ], function () {  
        Route::Post('sendemail', [ContactController::class, 'sendemail'])->name('sendemail');
        Route::get('messages', [ContactController::class, 'msgsindex'])->name('messages.msgsindex');  
        Route::patch('message/{id}/mark-as-read', [ContactController::class, 'markAsRead']);
        Route::get('{id}/show', [ContactController::class, 'show'])->name('message.show');   
        Route::delete('{id}/delete', [ContactController::class, 'destroy'])->name('message.destroy');  
    });  
});  
 

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
