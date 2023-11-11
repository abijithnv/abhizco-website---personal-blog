<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registeration;

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


//this was a sample default route

// Route::get('/', function () {
//     return view('register');
// });

//route to view home page or users list

Route::get('/', [registeration::class,'home']);

//to view register/add user page

Route::get('register', [registeration::class,'add']);

//to fetch details from register/add user page
Route::post('/user/store', [registeration::class,'store']);

//to fetch details from register/add user page
Route::delete('data/{id}/delete', [registeration::class,'destroy']);







