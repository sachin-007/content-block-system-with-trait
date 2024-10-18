<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// List all pages
Route::get('/', [PageController::class, 'index'])->name('pages.index');

// Show a page with its content blocks
Route::get('pages/{id}', [PageController::class, 'show'])->name('pages.show');

// Store content block for a page
Route::post('pages/{id}/content-blocks', [PageController::class, 'storeContentBlock'])->name('pages.storeContentBlock');

// Display the form to create a new page
    Route::get('create', [PageController::class, 'create'])->name('pages.create');

// Handle form submission and store the new page
Route::post('pages', [PageController::class, 'store'])->name('pages.store');