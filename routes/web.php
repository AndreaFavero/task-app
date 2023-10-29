<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('task.list');
    }
    else{
        return redirect()->route('login');
    }

    return view('welcome');
});

Route::middleware('auth')->group(function () {
    //default profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('task')->group(function(){
        //list
        Route::get('/', [TaskController::class, 'list'])->name('task.list');
        //create-edit
        Route::get('/edit/{id?}', [TaskController::class, 'edit'])->name('task.edit');
        Route::post('/post', [TaskController::class, 'post'])->name('task.post');
        //delete
        Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
        //check as completed
        Route::patch('/complete', [TaskController::class, 'complete'])->name('task.complete');
    });
});

Route::get('change-locale/{locale?}', function($locale){
    if(!$locale || !in_array($locale, ['en', 'it'])){
        App::setLocale('en');
        session()->put('locale', 'en');
    }
    else{
        App::setLocale($locale);
        session()->put('locale', $locale);
    }

    return redirect()->back()->with(['success' => __('diz.locale_changed')]);
})->name('change-locale');

require __DIR__.'/auth.php';
