<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/news', [NewsletterController::class, 'publicIndex'])
    ->name('news.public');

Route::middleware(['auth'])->group(function () {

    Route::get('/newsletters', [NewsletterController::class, 'index'])
        ->name('newsletters.index');

    Route::get('/newsletters/create', [NewsletterController::class, 'create'])
        ->name('newsletters.create');

    Route::post('/newsletters', [NewsletterController::class, 'store'])
        ->name('newsletters.store');

    Route::get('/newsletters/{id}', [NewsletterController::class, 'show'])
        ->name('newsletters.show');

    Route::get('/newsletters/{id}/edit', [NewsletterController::class, 'edit'])
        ->name('newsletters.edit');

    Route::put('/newsletters/{id}', [NewsletterController::class, 'update'])
        ->name('newsletters.update');

    Route::delete('/newsletters/{id}', [NewsletterController::class, 'destroy'])
        ->name('newsletters.destroy');

    Route::post('/newsletters/{id}/restore', [NewsletterController::class, 'restore'])
        ->name('newsletters.restore');
});

require __DIR__.'/auth.php';
