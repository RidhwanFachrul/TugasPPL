//
<?php
 
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

 
 
Route::get('/', function () {
    return view('login');
});
 
Route::group(['' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
       Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
       Route::get('/edit-profile', [UserController::class, 'edit'])->name('edit-profile');
       Route::post('/update-profile', [UserController::class, 'update'])->name('update-profile');

});

Route::resource("/student", StudentController::class);





