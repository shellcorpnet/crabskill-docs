<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'));
Route::get('/getting-started', fn () => view('pages.getting-started'));
Route::get('/installing', fn () => view('pages.installing'));
Route::get('/publishing', fn () => view('pages.publishing'));
Route::get('/selling', fn () => view('pages.selling'));
Route::get('/purchasing', fn () => view('pages.purchasing'));
Route::get('/api', fn () => view('pages.api'));
Route::get('/security', fn () => view('pages.security'));
Route::get('/meta-skill', fn () => view('pages.meta-skill'));
