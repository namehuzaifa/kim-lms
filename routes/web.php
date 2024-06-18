<?php

use App\Http\Controllers\AccessTokenController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CMSPagesController;
use App\Http\Controllers\CoachingController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuideUserTrackingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OnDemandSession\SubjectController;
use App\Http\Controllers\OnDemandSession\UserScreenController;
use App\Http\Controllers\PagesContentController;
use App\Http\Controllers\PoadcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ScheduleSession\SessionController;
use App\Http\Controllers\SessionBookingController;
use App\Http\Controllers\ScheduleSession\SessionGradeController;
use App\Http\Controllers\OnDemandSession\SessionclassController;
use App\Http\Controllers\SessionPaymentController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimnonialController;
use App\Http\Controllers\UsersController;
use App\Models\Coaching;
use App\Models\PagesContent;
use App\Models\SessionPayment;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
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

Route::controller(UserScreenController::class)->group(function (){
    Route::get('/class', 'class')->name('class')->middleware(['auth', 'Allow:user']);
    Route::get('/subjects/{slug}', 'subjects')->name('subjects')->middleware(['auth', 'Allow:user']);
    Route::get('/courses/{slug}', 'courses')->name('courses')->middleware(['auth', 'Allow:user']);
    Route::get('/course-detail/{slug}', 'courseDetail')->name('course-detail')->middleware(['auth', 'Allow:user']);
    Route::post('/course-slots', 'getSlots')->name('course-slots')->middleware(['auth', 'Allow:user']);
    Route::post('/course-booking/{slug?}', 'courseBooking')->name('course-booking')->middleware(['auth', 'Allow:user']);

    Route::get('ondemain-order-list/{id?}', 'orderList')->name('ondemain-order-list')->middleware(['auth']);
    Route::get('today-ondemain-list/', 'orderList')->name('today-ondemain-list')->middleware(['auth']);
    Route::get('pending-ondemain-list/', 'orderList')->name('pending-ondemain-list')->middleware(['auth',]);
    Route::get('attended-ondemain-list/', 'orderList')->name('attended-ondemain-list')->middleware(['auth',]);
    Route::get('not-attended-ondemain-list/', 'orderList')->name('not-attended-ondemain-list')->middleware(['auth',]);

});


Route::controller(AccessTokenController::class)->group(function (){
    Route::get('access-token-list', 'index')->name('access-token-list')->middleware(['auth', 'Allow:admin']);
    Route::post('access-token-create', 'store')->name('access-token-store')->middleware(['auth', 'Allow:,admin']);
    Route::get('access-token-delete/{id}', 'destroy')->name('access-token-delete')->middleware(['auth', 'Allow:,admin']);
});

Route::controller(UsersController::class)->group(function (){
    Route::get('user-create', 'create')->name('user-create')->middleware(['auth', 'Allow:,admin']);
    Route::post('user-create', 'store')->name('user-store')->middleware(['auth', 'Allow:,admin']);

    Route::get('user-edit/{id}', 'edit')->name('user-edit')->middleware(['auth']);
    Route::post('user-update/{id}', 'update')->name('user-update')->middleware(['auth']);

    Route::get('user-list', 'index')->name('user-list')->middleware(['auth', 'Allow:admin']);
    Route::get('user-delete/{id}', 'destroy')->name('user-delete')->middleware(['auth', 'Allow:,admin']);

    Route::get('add-user-session/{id}', 'addSession')->name('add-user-session')->middleware(['auth', 'Allow:,admin']);
    Route::post('coaching-detail', 'coachingDetail')->name('coaching-detail')->middleware(['auth', 'Allow:,admin']);
});


Route::controller(CoachingController::class)->group(function (){
    Route::get('coaching-create', 'create')->name('coaching-create')->middleware(['auth', 'Allow:coach,admin',]);
    Route::post('coaching-create', 'store')->name('coaching-store')->middleware(['auth', 'Allow:coach,admin',]);

    Route::get('coaching-edit/{id}', 'edit')->name('coaching-edit')->middleware(['auth', 'Allow:coach,admin',]);
    Route::post('coaching-update/{id}', 'update')->name('coaching-update')->middleware(['auth', 'Allow:coach,admin',]);

    Route::get('coaching-list', 'index')->name('coaching-list')->middleware(['auth', 'Allow:coach,admin',]);
    Route::get('coaching-delete/{id}', 'destroy')->name('coaching-delete')->middleware(['auth', 'Allow:coach,admin',]);
    Route::post('create-slot', 'createSlot')->name('create-slot')->middleware(['auth', 'Allow:coach,admin',]);
});


Route::controller(SessionGradeController::class)->group(function (){
    Route::get('grade-create', 'create')->name('grade-create')->middleware(['auth', 'Allow:admin',]);
    Route::post('grade-create', 'store')->name('grade-store')->middleware(['auth', 'Allow:admin',]);

    Route::get('grade-edit/{id}', 'edit')->name('grade-edit')->middleware(['auth', 'Allow:admin',]);
    Route::post('grade-update/{id}', 'update')->name('grade-update')->middleware(['auth', 'Allow:admin',]);

    Route::get('grade-list', 'index')->name('grade-list')->middleware(['auth', 'Allow:admin',]);
    Route::get('grade-delete/{id}', 'destroy')->name('grade-delete')->middleware(['auth', 'Allow:admin',]);
});

Route::controller(SessionController::class)->group(function (){
    Route::get('schedule-session-create', 'create')->name('schedule-session-create')->middleware(['auth', 'Allow:admin',]);
    Route::post('schedule-session-create', 'store')->name('schedule-session-store')->middleware(['auth', 'Allow:admin',]);

    Route::get('schedule-session-edit/{id}', 'edit')->name('schedule-session-edit')->middleware(['auth', 'Allow:admin',]);
    Route::post('schedule-session-update/{id}', 'update')->name('schedule-session-update')->middleware(['auth', 'Allow:admin',]);

    Route::get('schedule-session-list', 'index')->name('schedule-session-list')->middleware(['auth', 'Allow:admin',]);
    Route::get('schedule-session-delete/{id}', 'destroy')->name('schedule-session-delete')->middleware(['auth', 'Allow:admin',]);
});

Route::controller(SubjectController::class)->group(function (){
    Route::get('subject-create', 'create')->name('subject-create')->middleware(['auth', 'Allow:admin',]);
    Route::post('subject-create', 'store')->name('subject-store')->middleware(['auth', 'Allow:admin',]);

    Route::get('subject-edit/{id}', 'edit')->name('subject-edit')->middleware(['auth', 'Allow:admin',]);
    Route::post('subject-update/{id}', 'update')->name('subject-update')->middleware(['auth', 'Allow:admin',]);

    Route::get('subject-list', 'index')->name('subject-list')->middleware(['auth', 'Allow:admin',]);
    Route::get('subject-delete/{id}', 'destroy')->name('subject-delete')->middleware(['auth', 'Allow:admin',]);
});

Route::controller(SessionclassController::class)->group(function (){
    Route::get('class-create', 'create')->name('class-create')->middleware(['auth', 'Allow:admin',]);
    Route::post('class-create', 'store')->name('class-store')->middleware(['auth', 'Allow:admin',]);

    Route::get('class-edit/{id}', 'edit')->name('class-edit')->middleware(['auth', 'Allow:admin',]);
    Route::post('class-update/{id}', 'update')->name('class-update')->middleware(['auth', 'Allow:admin',]);

    Route::get('class-list', 'index')->name('class-list')->middleware(['auth', 'Allow:admin',]);
    Route::get('class-delete/{id}', 'destroy')->name('class-delete')->middleware(['auth', 'Allow:admin',]);
});

// Route::controller(CoursesController::class)->group(function (){
//     // Route::get('courses-create', 'create')->name('courses-create')->middleware(['auth','user', 'coach']);
//     Route::get('courses-create', 'create')->name('courses-create')->middleware(['auth','user', 'coach']);
//     Route::post('courses-create', 'store')->name('courses-store')->middleware(['auth','user', 'coach']);

//     Route::get('courses-edit/{id}', 'edit')->name('courses-edit')->middleware(['auth','user', 'coach']);
//     Route::post('courses-update/{id}', 'update')->name('courses-update')->middleware(['auth','user', 'coach']);

//     Route::get('courses-list', 'index')->name('courses-list')->middleware(['auth','user', 'coach']);
//     Route::get('courses-delete/{id}', 'destroy')->name('courses-delete')->middleware(['auth','user', 'coach']);
// });

// Route::controller(BlogController::class)->group(function (){
//     Route::get('blog-create', 'create')->name('blog-create')->middleware(['auth','user', 'coach']);
//     Route::post('blog-create', 'store')->name('blog-store')->middleware(['auth','user', 'coach']);

//     Route::get('blog-edit/{id}', 'edit')->name('blog-edit')->middleware(['auth','user', 'coach']);
//     Route::post('blog-update/{id}', 'update')->name('blog-update')->middleware(['auth','user', 'coach']);

//     Route::get('blog-list', 'index')->name('blog-list')->middleware(['auth','user', 'coach']);
//     Route::get('blog-delete/{id}', 'destroy')->name('blog-delete')->middleware(['auth','user', 'coach']);
// });

// Route::controller(PagesContentController::class)->group(function (){
//     Route::get('page-create', 'create')->name('page-create')->middleware(['auth','user', 'coach']);
//     Route::post('page-create', 'store')->name('page-store')->middleware(['auth','user', 'coach']);

//     Route::get('page-edit/{id}', 'edit')->name('page-edit')->middleware(['auth','user', 'coach']);
//     Route::post('page-update/{id}', 'update')->name('section-page-update')->middleware(['auth','user', 'coach']);

//     Route::get('page-list', 'index')->name('page-list')->middleware(['auth','user', 'coach']);

//     Route::get('page-delete/{id}', 'destroy')->name('page-delete')->middleware(['auth','user', 'coach']);
// });

// Route::controller(PoadcastController::class)->group(function (){
//     Route::get('podcast-create', 'create')->name('poadcast-create')->middleware(['auth','user', 'coach']);
//     Route::post('podcast-create', 'store')->name('poadcast-store')->middleware(['auth','user', 'coach']);

//     Route::get('podcast-edit/{id}', 'edit')->name('poadcast-edit')->middleware(['auth','user', 'coach']);
//     Route::post('podcast-update/{id}', 'update')->name('poadcast-update')->middleware(['auth','user', 'coach']);

//     Route::get('podcast-list', 'index')->name('poadcast-list')->middleware(['auth','user', 'coach']);
//     Route::get('podcast-delete/{id}', 'destroy')->name('poadcast-delete')->middleware(['auth','user', 'coach']);
// });

Route::controller(SessionPaymentController::class)->group(function (){
    Route::get('payment-list', 'index')->name('payment-list')->middleware(['auth']);
    Route::get('paymentchargebylink/{id}', 'store')->name('payment-charge');
});


Route::controller(QueryController::class)->group(function (){
    Route::get('/contact-querys/{type}', 'index')->name('contact-querys')->middleware(['auth']);
    Route::get('/webinars-querys/{type}', 'index')->name('webinars-querys')->middleware(['auth']);
    Route::get('/group-querys/{type}', 'index')->name('group-coaching-querys')->middleware(['auth']);
    Route::post('query/{type}', 'store')->name('store-query');
});

Route::controller(GuideUserTrackingController ::class)->group(function (){
    Route::get('/guide-tracking', 'index')->name('guide-tracking')->middleware(['auth']);
    Route::post('guide-tracking', 'store')->name('guide-store');
});


Route::controller(NewsLetterController::class)->group(function (){
    Route::get('newsletter-list', 'index')->name('newsletter-list')->middleware(['auth','user', 'coach']);
    Route::post('post-email', 'postEmail')->name('post-email')->middleware(['auth','user', 'coach']);
    Route::post('newsletter-create', 'store')->name('newsletter-create');
});

Route::controller(SessionBookingController::class)->group(function (){
    // Route::get('session-create', 'create')->name('session-create')->middleware(['auth','user', 'coach']);
    // Route::post('session-create', 'store')->name('session-store')->middleware(['auth','user', 'coach']);

    Route::post('/session-booking/{slug?}', 'store')->name('session-create')->middleware(['auth']);
    Route::post('/session-slots', 'getSlots')->name('get-slots')->middleware(['auth']);

    Route::get('session-edit/{id}', 'edit')->name('session-edit')->middleware(['auth']);
    Route::post('session-update/{id}', 'update')->name('session-update')->middleware(['auth']);

    Route::get('session-list/{id?}', 'index')->name('session-list')->middleware(['auth']);

    Route::get('today-session-list/', 'index')->name('today-session-list')->middleware(['auth', 'Allow:user',]);
    Route::get('pending-session-list/', 'index')->name('pending-session-list')->middleware(['auth', 'Allow:user',]);
    Route::get('done-session-list/', 'index')->name('done-session-list')->middleware(['auth', 'Allow:user',]);

    Route::get('session-delete/{id}', 'destroy')->name('session-delete')->middleware(['auth', 'Allow:user',]);

    Route::post('charge-payment', 'paymentCharge')->name('charge-payment')->middleware(['auth',]);
});


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth',])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('modules.admin.dashboard.index');
// })->middleware(['auth',])->name('dashboard');


Route::middleware(['auth', 'Allow:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::controller(CMSPagesController::class)->group(function() {
    Route::get('page-content/{type}','edit')->name('cms-page-edit')->middleware('auth');
    Route::post('page-content/{type}','update')->name('page-update')->middleware('auth');
});

Route::controller(SiteSettingController::class)->group(function() {
    Route::get('site-setting/','edit')->name('site-setting')->middleware('auth');
    Route::post('site-setting/','update')->name('setting-update')->middleware('auth');
});


// Route::controller(TestimnonialController::class)->group(function (){
//     Route::get('testimnonial-create', 'create')->name('testimnonial-create')->middleware(['auth','user', 'coach']);
//     Route::post('testimnonial-create', 'store')->name('testimnonial-store')->middleware(['auth','user', 'coach']);

//     Route::get('testimnonial-edit/{id}', 'edit')->name('testimnonial-edit')->middleware(['auth','user', 'coach']);
//     Route::post('testimnonial-update/{id}', 'update')->name('testimnonial-update')->middleware(['auth','user', 'coach']);

//     Route::get('testimnonial-list', 'index')->name('testimnonial-list')->middleware(['auth','user', 'coach']);
//     Route::get('testimnonial-delete/{id}', 'destroy')->name('testimnonial-delete')->middleware(['auth','user', 'coach']);
// });

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');


Route::controller(FrontController::class)->group(function () {
    // Route::get('/home', 'home')->name('home');
    Route::get('/coaching', 'coaching')->name('coaching');
    Route::get('/about', 'about')->name('about');
    Route::get('/session-detail/{slug?}', 'sessionDetail')->name('session-detail');

    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog-detail/{slug?}', 'blogDetail')->name('blog-detail');

    Route::get('/podcast', 'poadcast')->name('poadcast');
    Route::get('/podcast-detail/{slug?}', 'poadcastDetail')->name('poadcast-detail');

    Route::get('/course', 'course')->name('course');
    Route::get('/course-detail/{slug?}', 'courseDetail')->name('course-detail');

    Route::get('/session-booking/{slug?}', 'sessionBooking')->name('session-booking')->middleware(['auth']);

    Route::get('pages/{slug}', 'pages')->name('pages');

    // Route::post('/session-booking/{slug?}', 'sessionCreate')->name('session-create')->middleware(['auth']);

    // Route::post('/session-slots', 'getSlots')->name('get-slots')->middleware(['auth']);

    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::get('/thankyou', 'thankyou')->name('thankyou');
});

// Route::get('/call', function(){
//   return Artisan::call('migrate');
// });

require __DIR__.'/auth.php';
