<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\VisitorController;
use App\Http\Livewire\Audience\AudienceComponenente;
use App\Http\Livewire\Principal\FacadeFeriaComponent;
use App\Http\Livewire\StandsComponente;
use App\Http\Livewire\Visitor as LivewireVisitor;
use App\Http\Livewire\VisitorsModal;
use App\Http\Livewire\VisitorsRegisterModal;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
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

// Rutas con nombres
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/singup', [LivewireVisitor::class, 'store'])->name('singup');


Route::get('/goTofeair', [\App\Http\Controllers\visitorLayoutController::class, 'edit'])->name('facade');

Route::get('/feriafair360', FacadeFeriaComponent::class)->name('feriafair360');

Route::get('/stands', StandsComponente::class)->name('stands');
Route::resource('uploadImage', StandController::class);
Route::get('/', [PrincipalController::class, 'index'])->name('principal');
Route::get('/blog/{id}', [PrincipalController::class, 'show'])->name('blog.show');
Route::get('/stands', [PrincipalController::class, 'getListStands'])->name('stands.show');
Route::get('/movie/live', [PrincipalController::class, 'getMovie'])->name('movie.show');
Route::post('/visitors/create', [VisitorController::class, 'submit'])->name('storage.visitor');
Route::get('/search-visitor', VisitorsModal::class)->name('search-visitor');

Route::middleware(['auth:visitor'])->group(function () {
    Route::get('/visitor/profile', [VisitorController::class, 'index'])->name('visitor.profile');
    Route::post('/visitor/profile/edit', [VisitorController::class, 'update'])->name('visitor.profile.edit');
});

Route::get('/register-visitors', VisitorsRegisterModal::class)->name('visitor.create');
Route::post('/visitor/logout', [LoginController::class, 'visitorLogout'])->name('visitor.logout');

Route::middleware(['auth:visitor', 'checkOnEvento'])->group(function () {
    Route::get('/auditorio', AudienceComponenente::class)->name('audience');
});

Route::get('/testt', function () {
    return view('video');
});
Route::get('/confirmation/{code}', [ConfirmationController::class, 'confirmEmail'])->name('confirmation');
Route::get('register', function () {
    Mail::to('pabloanrozu@gmail.com')->send(new RegisterMail);

    return 'MENSAJE ENVIADO';
});
Route::post('confirmationCodeResend', [ConfirmationController::class, 'confirmationCodeResend'])->name('confirmationCodeResend');
Route::get('/termsAndConditions', function () {
    return view('termsAndConditions.termsAndConditions');
})->name('/termsAndConditions');
Route::get('/barra', function () {
    return view('barra');
})->name('/barra');

Route::get('/standDetail/{id}', \App\Http\Livewire\StandDetailComponent::class)->name('standDetail');
Route::controller(\App\Http\Controllers\imageController::class)->group(function () {
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');

});

Route::get('not_registered', function () {
    return view('visitors.login_visitor');
})->name('visitor.not.authenticated');

Route::get('register', function () {
    return view('visitors.register_visitor');
})->name('visitor.register');

Route::prefix('visitor')->group(function () {
    Route::get('show', [\App\Http\Controllers\VisitorLoginController::class, 'showLoginForm'])->name('visitor.show');
    Route::get('login', LivewireVisitor\NotAutComponent::class)->name('visitor.login');
    Route::post('logout', [\App\Http\Controllers\VisitorLoginController::class, 'logout'])->name('visitor.logout');
    Route::get('create', LivewireVisitor\NotAutCreate::class)->name('visitor.create');

});

Route::get('/weall', function () {
    return view('welcome');
});
Route::post('update-on-event/{visitorId}', [VisitorController::class, 'updateOnEvent'])->name('update-on-event');
Route::get('/testpdf/{id}', [\App\Http\Controllers\visitorLayoutController::class, 'report'])->name('download.report');


