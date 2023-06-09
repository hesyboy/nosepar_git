<?php

use App\Http\Controllers\Admin\ChallengeController as AdminChallengeController;
use App\Http\Controllers\Admin\ExpertController;
use App\Http\Controllers\Admin\notificationController as AdminNotificationController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\TeamExpertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserExpertController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\UserEmailVerifyController;
use App\Http\Controllers\Panel\AccountController;
use App\Http\Controllers\Panel\ChallengeController;
use App\Http\Controllers\Panel\NotificationController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\TeamController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Site\Auth\PasswordResetController;
use App\Http\Controllers\Site\Auth\UserCompleteInfoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('site.index');
// });


Route::get('/storage',function(){
    // Artisan::command('php artisan storage:link');
    Artisan::call('storage:link');
});


Route::prefix('/')->group(function(){
    Route::get('/',[SiteController::class,'index'])->name('site.index');
    Route::get('/about-us',[SiteController::class,'aboutUs'])->name('site.about-us');
    Route::get('/contact-us',[SiteController::class,'contactUs'])->name('site.contact-us');

    Route::prefix('auth')->group(function(){
        Route::get('reset-password/{token}', [PasswordResetController::class, 'index'])->name('site.auth.password-reset.index');
        Route::get('verify-email', [UserEmailVerifyController::class, 'index'])->middleware(['auth'])->name('site.auth.verifyemail.index');
        Route::get('complete-info', [UserCompleteInfoController::class, 'index'])->middleware(['auth'])->name('site.auth.complete-info.index');
        Route::get('google/redirect',[GoogleAuthController::class,'redirect'])->name('google.auth.redirect');
        Route::get('google/callback',[GoogleAuthController::class,'callback'])->name('google.auth.callback');
    });
});

Route::prefix('/panel')->middleware(['auth','register.email.verify','user.complete.info'])->group(function(){
    Route::get('/',[PanelController::class,'index'])->name('panel.index');
    Route::prefix('/account')->group(function(){
        Route::get('/',[AccountController::class,'index'])->name('panel.account.index');
        Route::post('/update',[AccountController::class,'update'])->name('panel.account.update');
    });
    Route::prefix('/teams')->group(function(){
        Route::get('/',[TeamController::class,'index'])->name('panel.teams.index');
        Route::get('/create',[TeamController::class,'create'])->name('panel.teams.create');
        Route::post('/store',[TeamController::class,'store'])->name('panel.teams.store');
        Route::get('/show/{id}',[TeamController::class,'show'])->name('panel.teams.show');
        Route::get('/manage/{id}',[TeamController::class,'manage'])->name('panel.teams.manage');
    });
    Route::prefix('/challenge')->group(function(){
        Route::get('/',[ChallengeController::class,'index'])->name('panel.challenge.index');
        Route::get('/show/{id}',[ChallengeController::class,'show'])->name('panel.challenge.show');

    });
    Route::prefix('/profile')->group(function(){
        // Route::get('/',[ProfileController::class,'index'])->name('panel.profile.index');
        Route::get('/show/{code}',[ProfileController::class,'show'])->name('panel.profile.show');
    });
    Route::prefix('/notification')->group(function(){
        Route::get('/',[NotificationController::class,'index'])->name('panel.notifications.index');
        Route::get('/create',[NotificationController::class,'create'])->name('panel.notifications.create');
        Route::post('/store',[NotificationController::class,'store'])->name('panel.notifications.store');
    });
});





Route::prefix('/admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');

    Route::prefix('/users')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('admin.users.index');
        Route::delete('/delete/{code}',[UserController::class,'delete'])->name('admin.users.delete');
    });

    Route::prefix('/teams')->group(function(){
        Route::get('/',[AdminTeamController::class,'index'])->name('admin.teams.index');
        Route::delete('/delete/{id}',[AdminTeamController::class,'delete'])->name('admin.teams.delete');
    });

    Route::prefix('/experts')->group(function(){
        Route::get('/',[ExpertController::class,'index'])->name('admin.experts.index');
        Route::get('/create',[ExpertController::class,'create'])->name('admin.experts.create');
        Route::get('/edit/{id}',[ExpertController::class,'edit'])->name('admin.experts.edit');
        Route::put('/update/{id}',[ExpertController::class,'update'])->name('admin.experts.update');
        Route::post('/store',[ExpertController::class,'store'])->name('admin.experts.store');
        Route::delete('/delete/{id}',[ExpertController::class,'delete'])->name('admin.experts.delete');

        Route::prefix('/users')->group(function(){
            Route::get('/',[UserExpertController::class,'index'])->name('admin.experts.users.index');
            Route::get('upgrade/{id}',[UserExpertController::class,'upgrade'])->name('admin.experts.users.upgrade');
            Route::get('downgrade/{id}',[UserExpertController::class,'downgrade'])->name('admin.experts.users.downgrade');
            Route::get('delete/{id}',[UserExpertController::class,'delete'])->name('admin.experts.users.delete');
        });

        Route::prefix('/teams')->group(function(){
            Route::get('/',[TeamExpertController::class,'index'])->name('admin.experts.teams.index');
            Route::get('upgrade/{id}',[TeamExpertController::class,'upgrade'])->name('admin.experts.teams.upgrade');
            Route::get('downgrade/{id}',[TeamExpertController::class,'downgrade'])->name('admin.experts.teams.downgrade');
            Route::get('delete/{id}',[TeamExpertController::class,'delete'])->name('admin.experts.teams.delete');
        });
    });



    Route::prefix('/challenge')->group(function(){
        Route::get('/',[AdminChallengeController::class,'index'])->name('admin.challenge.index');
        Route::get('/create',[AdminChallengeController::class,'create'])->name('admin.challenge.create');
        Route::post('/store',[AdminChallengeController::class,'store'])->name('admin.challenge.store');
        Route::get('/edit/{id}',[AdminChallengeController::class,'edit'])->name('admin.challenge.edit');
        Route::post('/update/{id}',[AdminChallengeController::class,'update'])->name('admin.challenge.update');
        Route::delete('/delete/{id}',[AdminChallengeController::class,'delete'])->name('admin.challenge.delete');

    });

    Route::prefix('/notification')->group(function(){
        Route::get('/',[AdminNotificationController::class,'index'])->name('admin.notifications.index');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
