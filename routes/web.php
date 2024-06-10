<?php
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return (! Auth::check()) ? view('auth.login') : Redirect::to(getDashboardURL());
})->name('login');


//Dark Mode
Route::get('update-dark-mode', [UserController::class, 'updateDarkMode'])->name('update-dark-mode');

//change Language
Route::post('update-language', [UserController::class, 'updateLanguage'])->name('change-language');


Route::middleware('auth', 'xss', 'checkUserStatus')->group(function () {
    // Update profile
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.setting');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('update.profile.setting');
    Route::put('/change-user-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::put('/email-notification', [UserController::class, 'emailNotification'])->name('emailNotification');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', function(){
        return redirect(route('murid.index'));
    })->name('admin.dashboard');
});


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('murid', MuridController::class)->parameters(['murids' => 'murid']);
    Route::resource('guru', GuruController::class)->parameters(['gurus' => 'guru']);
    Route::resource('pelajaran', MataPelajaranController::class)->parameters(['pelajarans' => 'pelajaran']);
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
    Route::resource('nilai', NilaiController::class)->parameters(['nilai' => 'nilai']);
});

require __DIR__.'/auth.php';
