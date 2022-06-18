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


Route::get('/',"App\Http\Controllers\IndexController@Index")->name('index');
Route::post('/','\App\Http\Controllers\mailController@MailPost')->name('mail-post');

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
    Route::post('/proje/change-status', '\App\Http\Controllers\admin\projectController@ChangeStatus')->name('project_changeStatus');
    Route::post('/resim/change-status', '\App\Http\Controllers\admin\imageController@ChangeStatus')->name('image_changeStatus');
    Route::post('/video/change-status', '\App\Http\Controllers\admin\videoController@ChangeStatus')->name('video_changeStatus');
    Route::get('/kontrolpaneli', '\App\Http\Controllers\admin\adminController@Index')->name('index');




    Route::get('/resim', '\App\Http\Controllers\admin\imageController@Image')->name('image');
    Route::post('/resim', '\App\Http\Controllers\admin\imageController@ImageAdd')->name('image_add');
    Route::get('/resim/duzenle/{id}', '\App\Http\Controllers\admin\imageController@ImageEdit')->name('image_edit');
    Route::post('/resim/duzenle/{id}', '\App\Http\Controllers\admin\imageController@ImageUpdate')->name('image_update');
    Route::get('/resim/sil/{id}/', '\App\Http\Controllers\admin\imageController@ImageDelete')->name('image_delete');


    Route::get('/video', '\App\Http\Controllers\admin\videoController@Video')->name('video');
    Route::post('/video', '\App\Http\Controllers\admin\videoController@VideoAdd')->name('video_add');
    Route::get('/video/duzenle/{id}', '\App\Http\Controllers\admin\videoController@VideoEdit')->name('video_edit');
    Route::post('/video/duzenle/{id}', '\App\Http\Controllers\admin\videoController@VideoUpdate')->name('video_update');
    Route::get('/video/sil/{id}/', '\App\Http\Controllers\admin\videoController@VideoDelete')->name('video_delete');

    Route::get('/proje', '\App\Http\Controllers\admin\projectController@Project')->name('project');
    Route::post('/proje', '\App\Http\Controllers\admin\projectController@ProjectAdd')->name('project_add');
    Route::get('/proje/duzenle/{id}', '\App\Http\Controllers\admin\projectController@ProjectEdit')->name('project_edit');
    Route::post('/proje/duzenle/{id}/', '\App\Http\Controllers\admin\projectController@ProjectUpdate')->name('project_update');
    Route::get('/proje/sil/{id}/', '\App\Http\Controllers\admin\projectController@ProjectDelete')->name('project_delete');

    Route::get('/kullanici', '\App\Http\Controllers\admin\userController@User')->name('user');
    Route::post('/kullanici', '\App\Http\Controllers\admin\userController@UserAdd')->name('user_add');
    Route::get('/kullanici/duzenle/{id}', '\App\Http\Controllers\admin\userController@UserEdit')->name('user_edit');
    Route::post('/kullanici/duzenle/{id}/', '\App\Http\Controllers\admin\userController@UserUpdate')->name('user_update');
    Route::get('/kullanici/sil/{id}/', '\App\Http\Controllers\admin\userController@UserDelete')->name('user_delete');


});
