<?php

use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PasteController::class, 'createPaste'])->name('paste.create');

Route::post('/paste', [PasteController::class, 'store'])->name('paste.store');
Route::get('/paste/{hash}', [PasteController::class, 'getByHash'])->name('paste.getByHash');

require __DIR__.'/auth.php';
