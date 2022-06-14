<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AdminControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Livewire\Front\Index;
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


Route::get('/',"App\Http\Controllers\IndexController@index")->name('index');
Route::post('/','\App\Http\Controllers\mailController@mail_post')->name('mail-post');

Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);
    // Authentication...
    if ($enableViews) {
        Route::get('/giris-yap', [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
    }
    $limiter = config('fortify.limiters.login');
    Route::post('/giris-yap', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));
    Route::get('/cikis-yap', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get('/kayit-ol', [RegisteredUserController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('register');
        }
        Route::post('/kayit-ol', [RegisteredUserController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')]);
    }
});

Route::group(['namespace'=>'App\Http\Controllers\admin','prefix'=>'admin','middleware'=>['auth', AdminControl::class]],function()
{
    Route::post('/proje/change-status', '\App\Http\Controllers\admin\projectController@changeStatus')->name('project_changeStatus');
    Route::post('/resim/change-status', '\App\Http\Controllers\admin\imageController@changeStatus')->name('image_changeStatus');
    Route::post('/video/change-status', '\App\Http\Controllers\admin\videoController@changeStatus')->name('video_changeStatus');
    Route::get('/kontrolpaneli', '\App\Http\Controllers\admin\adminController@index')->name('index');




    Route::get('/resim', '\App\Http\Controllers\admin\imageController@image')->name('image');
    Route::post('/resim', '\App\Http\Controllers\admin\imageController@image_add')->name('image_add');
    Route::get('/resim/duzenle/{id}', '\App\Http\Controllers\admin\imageController@image_edit')->name('image_edit');
    Route::post('/resim/duzenle/{id}', '\App\Http\Controllers\admin\imageController@image_update')->name('image_update');
    Route::get('/resim/sil/{id}/', '\App\Http\Controllers\admin\imageController@image_delete')->name('image_delete');


    Route::get('/video', '\App\Http\Controllers\admin\videoController@video')->name('video');
    Route::post('/video', '\App\Http\Controllers\admin\videoController@video_add')->name('video_add');
    Route::get('/video/duzenle/{id}', '\App\Http\Controllers\admin\videoController@video_edit')->name('video_edit');
    Route::post('/video/duzenle/{id}', '\App\Http\Controllers\admin\videoController@video_update')->name('video_update');
    Route::get('/video/sil/{id}/', '\App\Http\Controllers\admin\videoController@video_delete')->name('video_delete');

    Route::get('/proje', '\App\Http\Controllers\admin\projectController@project')->name('project');
    Route::post('/proje', '\App\Http\Controllers\admin\projectController@project_add')->name('project_add');
    Route::get('/proje/duzenle/{id}', '\App\Http\Controllers\admin\projectController@project_edit')->name('project_edit');
    Route::post('/proje/duzenle/{id}/', '\App\Http\Controllers\admin\projectController@project_update')->name('project_update');
    Route::get('/proje/sil/{id}/', '\App\Http\Controllers\admin\projectController@project_delete')->name('project_delete');

    Route::get('/kullanici', '\App\Http\Controllers\admin\userController@user')->name('user');
    Route::post('/kullanici', '\App\Http\Controllers\admin\userController@user_add')->name('user_add');
    Route::get('/kullanici/duzenle/{id}', '\App\Http\Controllers\admin\userController@user_edit')->name('user_edit');
    Route::post('/kullanici/duzenle/{id}/', '\App\Http\Controllers\admin\userController@user_update')->name('user_update');
    Route::get('/kullanici/sil/{id}/', '\App\Http\Controllers\admin\userController@user_delete')->name('user_delete');


});
