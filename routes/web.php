<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Worker;
use App\Http\Controllers\Owner;
use App\Http\Controllers\Admin;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\Auth\RegisteredUserController;


// Public Routes
Route::get('/', [Welcome::class, 'welcome'])->name('welcome');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');


// Middlewares
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/admin', [Admin::class, 'admin'])->name('admin');
    Route::post('/admin/add-user', [Admin::class, 'add_user'])->name('admin.add_user');
    Route::post('/admin/edit-user', [Admin::class, 'edit_user'])->name('admin.edit_user');
    Route::post('/admin/delete-user', [Admin::class, 'delete_user'])->name('admin.delete_user');

    // Owner Dashboard
    Route::get('/owner', [Owner::class, 'owner'])->name('owner');
    Route::post('/owner/add-property', [Owner::class, 'add_property'])->name('owner.add_property');
    Route::post('/owner/edit-property', [Owner::class, 'edit_property'])->name('owner.edit_property');
    Route::post('/owner/delete-property', [Owner::class, 'delete_property'])->name('owner.delete_property');
    Route::post('/owner/assign-work', [Owner::class, 'assign_work'])->name('owner.assign-work');
    
    // worker Routes
    Route::get('/worker', [Worker::class, 'worker'])->name('worker');
    Route::post('/work-completed', [Worker::class, 'work_completed'])->name('worker.work-completed');

    // Customer Routes
    Route::get('/customer', [Customer::class, 'customer'])->name('customer');
    Route::get('/customer/buy-property/{id}', [Customer::class, 'buy_property'])->name('customer.buy-property');
    Route::post('/customer/book-property', [Customer::class, 'book_property'])->name('customer.book-property');
    Route::post('/customer/add-feedback', [Customer::class, 'add_feedback'])->name('customer.add-feedback');
    Route::post('/customer/add-complaint', [Customer::class, 'add_complaint'])->name('customer.add-complaint');
    Route::post('/customer/edit-complaint', [Customer::class, 'edit_complaint'])->name('customer.edit-complaint');
    Route::post('/customer/delete-complaint', [Customer::class, 'delete_complaint'])->name('customer.delete-complaint');

    // profile and login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index', [redirectController::class, 'redirect'])->name('index');
});


// Include Authentication Routes
require __DIR__.'/auth.php';

