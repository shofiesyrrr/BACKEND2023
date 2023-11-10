<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route untuk menampilkan semua hewan
Route::get('animals', [AnimalController::class, "index"]);

//Route untuk menambahkan hewan
Route::post('animals', [AnimalController::class, "store"]);

//Route untuk mengedit hewan
Route::put('animals/{id}', [AnimalController::class, "update"]);

//Route untuk menghapus hewan
Route::delete('animals/{id}', [AnimalController::class, "destroy"]);


//Route untuk update student
Route::put('students/{id}', [StudentController::class, "update"]);

Route::middleware(['auth:sanctum'])->group(function () { 
    // Method Get 
    Route::get('/students', [StudentController::class, 'index']); 
     
    // Method Post 
    Route::post('/students', [StudentController::class, 'store']); 
     
    // Method Put 
    Route::put('/students/{id}', [StudentController::class, 'update']); 
     
    // Method Delete 
    Route::delete('/students/{id}', [StudentController::class, 'destroy']); 
     
    // Get Detail Resource 
    Route::get('/students/{id}', [StudentController::class, 'show']); 
    }); 
     
    Route::post('/register', [AuthController::class, 'register']); 
    Route::post('/login', [AuthController::class, 'login']);