<?php

use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'SharePastesMiddleware'], function () {
    Route::get('/', [PasteController::class, 'create'])->name('paste.create');
    Route::get('/paste/{hash}', [PasteController::class, 'getByHash'])->name('paste.getByHash');
});

Route::post('/paste', [PasteController::class, 'store'])->name('paste.store');

Route::get('/pastes', [PasteController::class, 'list'])
    ->middleware('auth')
    ->name('pastes.list');

require __DIR__.'/auth.php';
